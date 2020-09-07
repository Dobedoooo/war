<?php

    namespace lib;

    class page {

        public $fullPath;
        public $currentPage;
        public $pages = 10;
        public $total = 200;
        public $nums = 10;
        public $limit = '';

        private function getUrlInfo() {

            $originPath = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

            $search = \substr(\strchr($originPath, '?'), 1);

            $reg = '/&*page=\d*/';

            $search = preg_replace($reg, '', $search);

            if(isset($_GET['page'])) {

                $this->currentPage = $_GET['page'];

            } else {

                $this->currentPage = 0;
            }

            $this->fullPath = $path.'?'.$search.'&page=';

        }

        public function show() {

            $this->getUrlInfo();

            $str = '';

            $str.="<a requestAddr='{$this->fullPath}0'>[首页]</a>";

            $pre = $this->currentPage-1>0?$this->currentPage-1>0:0;

            $str.="<a requestAddr='{$this->fullPath}$pre'>[上一页]</a>";

            $start = $this->currentPage - floor($this->pages / 2) < 0?$this->currentPage:$this->currentPage - floor($this->pages / 2);

            $end = $this->currentPage + $this->pages > ($this->total / $this->pages)?($this->total / $this->pages):$this->currentPage + $this->pages;

            for ($i=$start; $i <= $end; $i++) { 
                # code...
                $num = $i + 1;
                if($i == $this->currentPage) {
                    $style = 'style=color: red';
                }
                $str.="<a requestAddr='{$this->fullPath}$i'>[{$num}]</a>";
            }

            $next = $this->currentPage + 1 > floor($this->total/$this->nums)-1?floor($this->total/$this->nums)-1:$this->currentPage + 1;

            $str.="<a requestAddr='{$this->fullPath}$next'>[下一页]</a>";

            $last = floor($this->total/$this->nums)-1;

            $str.="<a requestAddr='{$this->fullPath}$last'>[尾页]</a>";

            $this->limit = " LIMIT ".($this->currentPage * $this->nums).",".$this->nums; 

            return $str;
        }

    }