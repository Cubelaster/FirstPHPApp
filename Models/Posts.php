<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
    }

    public static function all() {
      $list = [];
      $db = DbContextFactory::getDbContextInstance();
      $req = $db->query('SELECT * FROM dbo.Posts');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['Id'], $post['Author'], $post['Content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = DbContextFactory::getDbContextInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM dbo.Posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['Id'], $post['Author'], $post['Content']);
    }
  }
?>