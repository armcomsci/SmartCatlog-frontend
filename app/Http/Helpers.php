<?php 
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    function ShowDate($date,$format = "d/m/Y"){
        $date1      = date_create($date);
        $date2      = date_format($date1,$format);
        return $date2;
    }

    function MonthThai($month){
        if($month == "00"){
            $month = "12";
        }
        $strMonthCut = Array("01"=>"มกราคม"
                                ,"02"=>"กุมภาพันธ์"
                                ,"03"=>"มีนาคม"
                                ,"04"=>"เมษายน"
                                ,"05"=>"พฤษภาคม"
                                ,"06"=>"มิถุนายน"
                                ,"07"=>"กรกฎาคม"
                                ,"08"=>"สิงหาคม"
                                ,"09"=>"กันยายน"
                                ,"10"=>"ตุลาคม"
                                ,"11"=>"พฤจิกายน"
                                ,"12"=>"ธันวาคม");
        return $strMonthCut[$month];
    }

    function DateThai($strDate,$ShowTime = true){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
	
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
        if($ShowTime){
            return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        }else{
            return "$strDay $strMonthThai $strYear";
        }
		
	}

    function GetNotification(){
        $Notify = DB::table('LMSNottification')->orderByDesc('Datetime')->limit(15)->get();
        return $Notify;
    }
?>