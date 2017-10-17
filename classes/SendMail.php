<?php 
class SendMail // класс подготовки и отправки email
{
	private	$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";  // кодировка отправляемого письма
	private $to = "lyubomyr83@mail.ru"; // email получателя
    private $from; // email отправителя
    private $phone; // номер телефона отправителя
    private $subject; // тема письма
    private $mess; // текст письма
	
    public function __construct($from,$subject,$mess,$phone) // метод подготовки к отправке email
    {
		$s = '=?utf-8?B?'.base64_encode($subject).'?='; // кодируем тему письма
		
		$this->from = substr(htmlspecialchars(trim($from)), 0, 1000);
        $this->phone = substr(htmlspecialchars(trim($phone)), 0, 1000);
		$this->subject = substr(htmlspecialchars(trim($s)), 0, 1000);
        $this->mess = substr(htmlspecialchars(trim($mess)), 0, 1000000); 
        $this->mess .= "\r\n\r\nНомер телефона для связи: ".$this->phone;
        $this->mess .= "\r\n\r\nЭто письмо было отправлено с формы обратной связи сайта ".$_SERVER['HTTP_HOST'];
    }
    
    public function send() // метод отправки email
    {
        if(mail($this->to, $this->subject, $this->mess,  $this->headers.'From:'.$this->from))
        {
            echo '<center><img src="/admin/image/ok.png" border=0>Спасибо! Ваше письмо отправлено автору.</center>';  
        }
        else
        {
            echo '<center><img src="/admin/image/delete.png" border=0>Ошибка при отправке письма.</center>';
        }     
    }
}
?>