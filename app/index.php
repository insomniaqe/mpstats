<?php
require 'rb.php';

R::setup('mysql:host=localhost;dbname=admin_admin;', 'admin_admin', 'qweASD123');

class App
{
    public $token = false;
    public $userdata = false;

    public function __construct()
    {
        $this->getToken();
    }

    public function getToken()
    {
        if (!isset($_COOKIE['token'])) {
            $this->ad();
        }

        $this->token = $_COOKIE['token'];
        $getToken = R::findOne('mpstats_users','`token` = ?', array($this->token));
        if($getToken){
            $this->getMirror();
        }
        $this->ad();
    }

    public function ad()
    {
        die('access error');
    }

    public function getMirror()
    {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "Cookie: userlogin=a%3A2%3A%7Bs%3A3%3A%22lgn%22%3Bs%3A18%3A%22insomniaqe%40mail.ru%22%3Bs%3A3%3A%22pwd%22%3Bs%3A32%3A%22d9a151d787d541590cbefeaac7540d49%22%3B%7D\r\n"
            )
        );

        $context = stream_context_create($opts);

        $file = file_get_contents('https://mpstats.io/', false, $context);

        echo $file;
        ?>
        <script>
            let data = document.getElementsByTagName('link');
            for (let i = 0; i < data.length; i++) {
                if (document.getElementsByTagName('link')[i].href) {
                    document.getElementsByTagName('link')[i].href = 'https://mpstats.io' + data[i].href.substr(31);
                }
            }

            data2 = document.getElementsByTagName('script');
            for (let i2 = 0; i2 < data2.length; i2++) {
                if (document.getElementsByTagName('script')[i2].src) {
                    if (document.getElementsByTagName('script')[i2].src.includes("http")) {
                        document.getElementsByTagName('script')[i2].src = 'https://mpstats.io' + data2[i2].src.substr(31);
                    }
                }
            }


            App.init();
            App.dashboard();
            initMetas();
            initTables();

            //localStorage.setItem('s', document.getElementsByTagName('html')[0].innerHTML);
        </script>
        <?php
    }
}

$app = new App();
?>