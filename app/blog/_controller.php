<?php 

class Blog extends Controller {
    public function index()
    {
        if (!auth()) {
            redirect('users/login');
        }
        $data['title'] = 'Look at this Blog';
        $data['page'] = 'blog';
        $data['blog'] = Db::query('SELECT blog.id, blog.title, blog.created_at, users.name as author FROM blog JOIN users ON users.id = blog.userId ORDER BY blog.created_at DESC');
        $data['user'] = Db::read('users', ['email' => $_SESSION['email']]);
        $data['login'] = true;
        $this->views('blog/index', $data);
    }

    public function blog($id) {
        $data['page'] = 'blog';
        $data['blog'] = Db::read('blog', ['id' => $id])[0];
        $data['blog']['author'] = Db::read('users', ['id' => $data['blog']['userId']])[0]['name'];
        $this->views('blog/detail', $data);
    }

    public function store()
    {
        if (isset($_POST['id'])) {
            Db::create('blog', [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'userId' => $_POST['id'],
            ]);
        }
        redirect('blog');
    }
}