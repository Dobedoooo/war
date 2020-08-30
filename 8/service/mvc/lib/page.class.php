<?php

    namespace lib;

    class page {

        public $fullPath;
        public $currentPage;
        public $pages = 10;
        public $total = 200;

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

            $str.="<a href='{$this->fullPath}0'>[首页]</a>";

            $pre = $this->currentPage-1>0?$this->currentPage-1>0:0;

            $str.="<a href='{$this->fullPath}$pre'>[上一页]</a>";

            $start = $this->currentPage - floor($this->pages / 2) < 0?$this->currentPage:$this->currentPage - floor($this->pages / 2);

            $end = $this->currentPage + $this->pages > ($this->total / $this->pages)?($this->total / $this->pages):$this->currentPage + $this->pages;

            for ($i=$start; $i <= $end; $i++) { 
                # code...
                if($i == $this->currentPage) {
                    $style = 'style=color: red';
                }
                $str.="<a href='{$this->fullPath}$i'>[{$i}]</a>";
            }

            $next = $this->currentPage + 1 > ($this->total/$this->pages);

            echo $str;

        }

    }

    $page = new page;

    $page->show();