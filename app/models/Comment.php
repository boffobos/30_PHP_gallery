<?php
    class Comment {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getComments(){
            $this->db->query('SELECT *, 
                            comments.id AS commentId,
                            users.id AS userId,
                            comments.created_at AS commentCreated,
                            users.created_at AS userCreated
                            FROM comments
                            JOIN users
                            ON comments.user_id = users.id
                            ORDER BY comments.created_at DESC');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addComment($data){
            $this->db->query('INSERT INTO comments (title, user_id, body) VALUES(:title, :user_id, :body)');
            //Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            //Execure
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateComment($data){
            $this->db->query('UPDATE comments SET title = :title, body = :body WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            //Execure
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getCommentById($id){
            $this->db->query('SELECT * FROM comments WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function deleteComment($id){
            $this->db->query('DELETE FROM comments WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $id);

            //Execure
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }