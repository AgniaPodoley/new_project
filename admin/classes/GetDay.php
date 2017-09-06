<?php
class GetDay
{
    public $month = array(
				1=>"января",
				2=>"февраля",
				3=>"марта",
				4=>"апреля",
				5=>"мая",
				6=>"июня",
				7=>"июля",
				8=>"августа",
				9=>"сентября",
				10=>"октября",
				11=>"ноября",
				12=>"декабря"
				);
					
    public $day = array(
				0=>"воскресенье",
				1=>"понедельник",
				2=>"вторник",
				3=>"среда",
				4=>"четверг",
				5=>"пятница",
				6=>"суббота"
				);
                
    public function __construct()
    {
        echo 'Сегодня '.date("j")." ".$this->month[date("n")]." ".date("Y")." года, ".$this->day[date("w")];
        ;
    }
}