<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        
        <script type="text/javascript">
	
        var current="Time is up";
        var year= 2013;
        var month=9;
        var day=27;
        var hour=17;
        var minute=30;
        var tz=+8;
        
        //—>    DO NOT CHANGE THE CODE BELOW!    <—
        var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
        
        function countdown(yr,m,d,hr,min)
        {
            theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
            var today=new Date();
            var todayy=today.getYear();
            if (todayy < 1000) {
            todayy+=1900; }
            var todaym=today.getMonth();
            var todayd=today.getDate();
            var todayh=today.getHours();
            var todaymin=today.getMinutes();
            var todaysec=today.getSeconds();
            var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
            var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
            var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
            var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
            var dd=futurestring-todaystring;
            var dday=Math.floor(dd/(60*60*1000*24)*1);
            var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
            var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
            var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
            if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0)
            {
                document.getElementById('count2').innerHTML=current;
                document.getElementById('count2').style.display="inline";
                document.getElementById('count2').style.width="390px";
                document.getElementById('dday').style.display="none";
                document.getElementById('dhour').style.display="none";
                document.getElementById('dmin').style.display="none";
                document.getElementById('dsec').style.display="none";
                document.getElementById('days').style.display="none";
                document.getElementById('hours').style.display="none";
                document.getElementById('minutes').style.display="none";
                document.getElementById('seconds').style.display="none";
                return;
        
            }
            else
            {
                document.getElementById('count2').style.display="none";
                document.getElementById('dday').innerHTML=dday;
                document.getElementById('dhour').innerHTML=dhour;
                document.getElementById('dmin').innerHTML=dmin;
                document.getElementById('dsec').innerHTML=dsec;
                setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
            }
        }
        
        </script>
    </head>

<body onload="countdown(year,month,day,hour,minute)">
    <div id="form">
        <div class="numbers" id="count2" style="position: absolute; top: 10px; height: 60px; padding: 15px 0 0 10px; background-color: #000000; z-index: 20;"></div>
        <img src="../css/bkgdimage.gif" class="background" style="position: absolute; left: 69px; top: 12px;"/>
        <img src="../css/line.jpg" class="line" style="position: absolute; left: 69px; top: 40px;"/> 
        <div class="numbers" id="dday" style="position: absolute; left: 69px; top: 21px;" ></div>
    	
        <img src="../css/bkgdimage.gif" class="background" style="position: absolute; left: 141px; top: 12px;"/>
        <img src="../css/line.jpg" class="line" style="position: absolute; left: 141px; top: 40px;"/>
        <div class="numbers" id="dhour" style="position: absolute; left: 141px; top: 21px;" ></div>
    	
        <img src="../css/bkgdimage.gif" class="background" style="position: absolute; left: 213px; top: 12px;"/>
        <img src="../css/line.jpg" class="line" style="position: absolute; left: 213px; top: 40px;"/>
        <div class="numbers" id="dmin" style="position: absolute; left: 213px; top: 21px;" ></div>
    	
        <img src="../css/bkgdimage.gif" class="background" style="position: absolute; left: 285px; top: 12px;"/>
        <img src="../css/line.jpg" class="line" style="position: absolute; left: 285px; top: 40px;"/>
        <div class="numbers" id="dsec" style="position: absolute; left: 285px; top: 21px;" ></div>
    	
        <div class="title" id="days" style="position: absolute; left: 66px; top: 73px;" >Days</div>
        <div class="title" id="hours" style="position: absolute; left: 138px; top: 73px;" >Hours</div>
        <div class="title" id="minutes" style="position: absolute; left: 210px; top: 73px;" >Minutes</div>
        <div class="title" id="seconds" style="position: absolute; left: 282px; top: 73px;" >Seconds</div>
	<br /><br /><br /><br /><br /><a href="timer/set_time">Set date and time</a>
        <a href="timer/data">Ex</a>
        
    </div>
</body>
</html>