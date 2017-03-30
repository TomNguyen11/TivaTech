<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM."/core/TT_Model.php";
    class Star_Model extends DB_Driver
    {
        function __construct()
        {
            parent::__construct();
        }
        public function checkStar($userReID, $userClID)
        {
            $query = "SELECT * FROM tbl_stars
                        WHERE user_receive_id = '$userReID'
                        AND user_click_id = '$userClID'";
            $result = $this->getItem($query);
            if(!$result) {
                return false;
            }
            return true;
        }
        public function createStar($userReID, $userClID)
        {
            if(!$this->checkStar($userReID, $userClID)) {
                // Neu chua star thi insert vao tbl_stars
                $data = array(
                    'user_receive_id' => $userReID,
                    'user_click_id' => $userClID
                );
                $this->insert('tbl_stars', $data);
                // Tang 1 cho quatity_stars trong tbl_users
                $queryUD = "SELECT quatity_stars FROM tbl_users WHERE id='$userReID'";
                $resultUD = $this->getItem($queryUD);
                $quatity_stars = $resultUD['quatity_stars'] + 1;
                $dataUD = array(
                    'quatity_stars' => $quatity_stars
                );
                $whereUD = 'id='.$userReID;
                $this->update('tbl_users', $dataUD, $whereUD);
            } else {
                // Neu da click star thi delete khoi tbl_stars
                $whereDL = 'user_receive_id='.$userReID." AND user_click_id = ".$userClID;
                $this->delete('tbl_stars', $whereDL);
                // Giam 1 cho quatity_stars trong tbl_users
                $queryUD = "SELECT quatity_stars FROM tbl_users WHERE id='$userReID'";
                $resultUD = $this->getItem($queryUD);
                $quatity_stars = ($resultUD['quatity_stars']>0) ? $resultUD['quatity_stars'] - 1 : 0;
                $dataUD = array(
                    'quatity_stars' => $quatity_stars
                );
                $whereUD = 'id='.$userReID;
                $this->update('tbl_users', $dataUD, $whereUD);
            }
        }
    }
?>
