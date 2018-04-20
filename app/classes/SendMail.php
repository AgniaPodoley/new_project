<?php
namespace app\classes;

/**
 * @filename SendMail.php
 * набор компонентов для отправки письма
 * @author Любомир Пона
 * @copyright 24.09.2013
 * @updated 25.12.2017
 */

class SendMail // класс подготовки и отправки email
{
	private $to; // email получателя
    private $from; // email отправителя для ответа
    private $mail = "office@"; // email сервера с доменным именем
    private $phone; // номер телефона отправителя
    private $subject; // тема письма
    private $mess; // текст письма
    private	$headers; // кодировка отправляемого письма

    public function __construct($from,$subject,$mess,$phone=null) // метод подготовки к отправке email
    {
		$s = '=?utf-8?B?'.base64_encode($subject).'?='; // кодируем тему письма

        $this->getAdminEmail();
        $this->getServerEmail();
        $this->from = substr(htmlspecialchars(trim($from)), 0, 1000);
        $this->phone = substr(htmlspecialchars(trim($phone)), 0, 1000);
		$this->subject = substr(htmlspecialchars(trim($s)), 0, 1000);
        $this->mess = substr(trim($mess), 0, 1000000);
        if($phone){$this->mess .= "\r\n\r\nНомер телефона для связи: ".$this->phone;}
        $this->mess .= "\r\n\r\nЭто письмо было отправлено с сайта ".$_SERVER['HTTP_HOST'];
        $this->headers .= "From: " .$this->mail. "\r\n";
        $this->headers .= "Reply-To: " . $this->from . "\r\n";
        $this->headers .= "Content-type: text/html; charset=\"utf-8\"\r\n";
    }

    public function getAdminEmail() // метод получения почты администратора сайта
    {
        $sql = "SELECT admin_email FROM constants";
        $result = Db::getInstance()->sql($sql);
        $email = mysqli_fetch_assoc($result);
        $this->to = $email['admin_email'];
    }

    public function getServerEmail() // метод получения почты сервера домена с которого отправляем почту
    {
        $sql = "SELECT domainname FROM constants";
        $result = Db::getInstance()->sql($sql);
        $email = mysqli_fetch_assoc($result);
        $server_email = str_replace('http://','',$email['domainname']);
        $server_email = str_replace('/','.',$server_email);
        $this->mail .= $server_email;
    }
    
    public function send($silent=null) // метод отправки email
    {

        if(mail($this->to, $this->subject, $this->mess,  $this->headers.'From:'.$this->mail))
        {
            if($silent != "silent")
            {
                echo '<center><img src="/admin/image/ok.png" border=0>Спасибо! Ваше письмо отправлено автору.</center>';
            }

        }
        else
        {
            if($silent != "silent")
            {
                echo '<center><img src="/admin/image/delete.png" border=0>Ошибка при отправке письма.</center>';
            }
        }

    }
}
?>