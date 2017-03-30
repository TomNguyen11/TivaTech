<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class DB_Driver
    {
        /**
         * [$__conn bien luu tru ket noi]
         * @var [string]
         */
        protected $__conn;

        /**
         * [__contruct Khoi tao, ket noi database]
         * @return [None] [Not return]
         */
        function __construct() {
            // Neu chua ket noi
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if (!$this->__conn) {
                // Ket noi
                $this->__conn = mysqli_connect (DB_HOST,
                                                DB_USER,
                                                DB_PASSWORD,
                                                DB_NAME);

                // Xu ly truy van UTF8 de tranh loi font
                mysqli_query($this->__conn, "SET character_set_result = 'utf-8',
                                            character_set_client = 'utf-8',
                                            character_set_database = 'utf-8',
                                            character_set_server = 'utf-8'");
            }
        }

        /**
         * [disConnect Ham ngat ket noi]
         * @return boolean [true: success]
         */
        function disConnect(){
            // Neu dang ket noi
            if ($this->_conn) {
                mysqli_close($this->_conn);
            }
        }

        /**
         * [insert Function insert]
         * @param  [string] $table [Table  Name]
         * @param  [array] $data  [key => value ]
         * @return [boolean]        [true: success]
         */
        function insert($table, $data){
            // Luu tru danh sach key
            $keyList = '';
            // Luu tru danh sach value tuong ung
            $valueList = '';

            // Lap qua danh sach
            foreach ($data as $key => $value) {
                $keyList .= ", $key";
                $valueList .= ",'".mysqli_escape_string($this->__conn, $value)."'";
            }

            // Xoa dau , thua o keyList va valueList
            $query = 'INSERT INTO '.$table.'('.trim($keyList, ', ').') VALUES ('.trim($valueList, ',').')';

            $result =  mysqli_query($this->__conn, $query) or die ("ERROR INSERT: ".mysqli_error($this->__conn));
            if($result){
                return true;
            }
            return false;
        }

        /**
         * [update Function update]
         * @param  [string] $table [Name Table]
         * @param  [array] $data  [key => value]
         * @param  [dynanic] $where [Condition]
         * @return [boolean]        [true: success]
         */
         function update($table, $data, $where)
         {
             $sql = '';
             // Lặp qua data
             foreach ($data as $key => $value){
                 $sql .= "$key = '".mysqli_escape_string($this->__conn, $value)."',";
             }

             // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
             $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;

             return mysqli_query($this->__conn, $sql);
         }

        /**
         * [delete Function delete]
         * @param  [string] $table [Table Name]
         * @param  [dynamic] $where [Condition]
         * @return [boolean]        [true: success]
         */
        function delete($table, $where) {
            $query = "DELETE FROM ".$table." WHERE ". $where;
            return mysqli_query($this->__conn, $query) or die('ERROR DELETE : '.mysqli_error($this->__conn));
        }

        /**
         * [getList Function get list]
         * @param  [string] $query [query]
         * @return [array]        [result]
         */
        function getList($query) {
            $result = mysqli_query($this->__conn, $query);

            if(!$result) {
                die ('ERROR SQL: '.mysqli_error($this->__conn));
            }

            $return = array();

            // Lap qua ket qua de dau vao mang
            while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $return[] = $rows;
            }

            // Xoa ket qua khoi bo nho
            mysqli_free_result($result);

            return $return;
        }

        /**
         * [getItem Function get 1 item]
         * @param  [string] $query [query]
         * @return [array]        [result]
         */
        function getItem($query) {
            $result = mysqli_query($this->__conn, $query) or die ('ERROR GET ITEM: '.mysqli_error($this->__conn));
            if($result) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if($row) {
                    return $row;
                }
                return false;
            }
            return false;

        }
        /**
         * [getNumRow Function return number of record]
         * @param  [string] $query [query]
         * @return [int]        [rows]
         */
        function getNumRows($query)
        {
            $result = mysqli_query($this->__conn, $query) or die ('ERROR SQL: '.mysqli_error($this->__conn));
            $num = mysqli_num_rows($result);
            return $num;
        }
        public function getLastId()
        {
            return mysqli_insert_id($this->__conn);
        }
    }
?>
