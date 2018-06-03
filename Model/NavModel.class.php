<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 17:21
     */


    class NavModel extends Model
    {
        private $id;
        private $nav_name;
        private $nav_info;
        private $pid;
        private $sort;
        private $limit;

        public function __set($name, $value)
        {
            // TODO: Implement __set() method.
            $this->$name = Tool::htmlString( $value );
        }
        public function __get($name)
        {
            // TODO: Implement __get() method.
            return $this->$name;
        }

        //导航排序
        public function setNavSort() {
            $sql="";
            foreach ($this->sort as $_key=>$_value) {
                if (!is_numeric($_value)) continue;
                $sql .= "UPDATE cms_nav SET sort='$_value' WHERE id='$_key';";
            }
            return parent::multi($sql);
        }



        //总记录
        public function getNavTotal ()
        {
            $sql="SELECT COUNT(*) FROM cms_nav  ";
            return parent::total($sql);
        }

        //all nav
        public function getAllNav ()
        {
            $sql="SELECT * FROM cms_nav WHERE  pid=0 ORDER BY sort ASC $this->limit ";
            return parent::all($sql);
        }

        public function getOneNav() {
            $_sql = "SELECT 
										id,
										nav_name,
										nav_info
								FROM 
										cms_nav
							WHERE 
										nav_name='$this->nav_name'
									OR
									    id='$this->id'
								LIMIT 
										1";
            return parent::one($_sql);
        }

        //add
        public function addNav ()
        {
            $sql = "INSERT INTO 
												cms_nav (
																				nav_name,
																				nav_info,
																				pid,
																				sort
																		) 
														VALUES (
																				'$this->nav_name',
																				'$this->nav_info',
																				'$this->pid',
																				".parent::nextid('cms_nav')."
																		)";
            return parent::aud($sql);
        }

        //update
        public function updateNav ()
        {
            $_sql = "UPDATE 
										cms_nav 
								  SET 
										nav_name='$this->nav_name',
										nav_info='$this->nav_info' 
							WHERE 
										id='$this->id' 
								 LIMIT 
										1";
            return parent::aud($_sql);
        }

        //delete nav
        public function deleteNav ()
        {
            $sql="DELETE FROM cms_nav WHERE id=$this->id ";
            return parent::aud($sql);
        }


        //child
        //获取子导航总记录
        public function getNavChildTotal() {
            $sql = "SELECT 
										COUNT(*) 
								FROM 
										cms_nav
								WHERE
										pid=$this->id";
            return parent::total($sql);
        }


        public function getAllChildNav() {
            $sql = "SELECT 
										* 
								FROM 
										cms_nav
								WHERE
										pid='$this->id'
								ORDER BY 
										sort ASC
								$this->limit";
            return parent::all($sql);
        }

        // 前台
        public function getFrontNav() {
            $sql = "SELECT 
										id,
										nav_name
								FROM 
										cms_nav
								WHERE
										pid=0
								ORDER BY 
										sort ASC
								LIMIT
										0,10" ;
            return parent::all($sql);
        }




    }