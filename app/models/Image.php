<?php 
    class Image {
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function upload($data){
            $this->db->query('INSERT INTO images (name, user_id, path) VALUES(:name, :user_id, :path)');
            $results = [];
            for($i = 0; $i < count($data) - 3; $i++){
                $this->db->bind(':name', $data[$i]['name']);
                $this->db->bind(':user_id', $data[$i]['user_id']);
                $this->db->bind(':path', $data[$i]['path']);

                if($this->db->execute()){
                    $results[] = true;
                } else {
                    $results[] = false;
                }
            }
            return $results;
        }

        public function loadAll(){
            $this->db->query('SELECT * FROM images;');
            $results = $this->db->resultSet();

            return $results;
        }

        public function getImageById($id) {
            $this->db->query('SELECT * FROM images WHERE id = :id;');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }
    }