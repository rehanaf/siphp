<?php

class Db
{
    private static $pdo;

    public static function connect()
    {
        try {
            self::$pdo = new PDO("sqlite:database.sqlite");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
    }

    public static function createTable($tableName, $columns)
    {
        $columnsString = implode(", ", array_map(
            function ($col, $type) {
                return "$col $type";
            },
            array_keys($columns),
            $columns
        ));

        $createTableQuery = "CREATE TABLE IF NOT EXISTS $tableName ($columnsString)";

        try {
            self::$pdo->exec($createTableQuery);
            echo "Table $tableName created.\n";
        } catch (PDOException $e) {
            echo "Failed to create table: " . $e->getMessage() . "\n";
        }
    }

    public static function dropTable($tableName)
    {
        $dropTableQuery = "DROP TABLE IF EXISTS $tableName";

        try {
            self::$pdo->exec($dropTableQuery);
            echo "Table $tableName dropped.\n";
        } catch (PDOException $e) {
            echo "Failed to drop table: " . $e->getMessage() . "\n";
        }
    }

    public static function query($sql, $params = [])
    {
        try {
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // echo "Query failed: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public static function create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public static function read($table, $conditions = [], $columns = '*')
    {
        $sql = "SELECT $columns FROM $table";

        if (!empty($conditions)) {
            $conditionStrings = [];
            foreach ($conditions as $key => $value) {
                $conditionStrings[] = "$key = :$key";
            }
            $sql .= " WHERE " . implode(" AND ", $conditionStrings);
        }

        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($conditions);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($table, $data, $conditions)
    {
        $setStrings = [];
        foreach ($data as $key => $value) {
            $setStrings[] = "$key = :$key";
        }

        $conditionStrings = [];
        foreach ($conditions as $key => $value) {
            $conditionStrings[] = "$key = :$key";
        }

        $sql = "UPDATE $table SET " . implode(", ", $setStrings) . " WHERE " . implode(" AND ", $conditionStrings);

        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute(array_merge($data, $conditions));
    }

    public static function delete($table, $conditions)
    {
        $conditionStrings = [];
        foreach ($conditions as $key => $value) {
            $conditionStrings[] = "$key = :$key";
        }

        $sql = "DELETE FROM $table WHERE " . implode(" AND ", $conditionStrings);

        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute($conditions);
    }
}
