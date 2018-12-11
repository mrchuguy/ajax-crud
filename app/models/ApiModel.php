<?php
class ApiModel extends Model {
    
    public function get_news(){
        if($this->db->connect_errno===0){
            $query='select * from news';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }
    /**
     * 
     * @param string $title
     * @param string $text
     * @param string $image
     * @param timestamp $date
     */
    public function add_news($title, $text, $image, $date){
        if($this->db->connect_errno===0){
            $query='INSERT INTO news (title, text, image, date) values ("'.$title.'", "'.$text.'", "'.$image.'", "'.$date.'")';
            $this->db->query($query);
        }
    }

    /**
     * @param $id
     */
    public function delete_news($id){
        if($this->db->connect_errno === 0){
            $query = 'DELETE from news where id='.$id;
            $this->db->query($query);
        }
    }
    public function get_image_directory($id){
        if($this->db->connect_errno === 0){
            $query = 'select (image) from news where id='.$id;
            $res = $this->db->query($query);
            if($res){
                $arr = $res->fetch_all(MYSQLI_ASSOC);
                return $arr[0]['image'];
            } else{
                return false;
            }
        }
    }
    public function get_news_by_id($id){
	if($this->db->connect_errno === 0){
            $query = 'select * from news where id='.$id;
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }
    public function update_news($id, $title, $text, $date, $image=null){
	if($this->db->connect_errno===0){    
	    if($image === null){
		$query='update news set title="'.$title.'", text="'.$text.'", date="'.$date.'" where id="'.$id.'"';
		$this->db->query($query);
	    } else {
		$query='update news set title="'.$title.'", text="'.$text.'", date="'.$date.'", image="'.$image.'" where id="'.$id.'"';

		$this->db->query($query);
	    }
	}
    }
}
