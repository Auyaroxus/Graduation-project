<section>
            
            <script type = "text/javascript">
                function cclick(number) {
                    calform.display.value += number;
                }
                function equal(){
                    calform.display.value = eval(calform.display.value);
                }
                function ac() {
                    calform.display.value = "";
                }
                function deleteValue(){
                    var displayValue = calform.display.value;
                    calform.display.value = displayValue.substr(0, displayValue.length -1);
                }
                function functionSin() {
                    var displayValue = calform.display.value;
                    var toRadian = radiansToDegree(displayValue);
                    calform.display.value = Math.round(Math.sin(toRadian)*1000.0)/1000.0;
                    
                }
                function functionCos() {
                    var displayValue = calform.display.value;
                    var toRadian = radiansToDegree(displayValue);
                    calform.display.value = Math.round(Math.cos(toRadian)*1000.0)/1000.0;
                    
                }
                function functionTan() {
                    if (calform.display.value % 90 ==0 &&(calform.display.value % 180 !=0)) {
                        calform.display.value = "Nedefinováno";
                    }
                    else {
                    var displayValue = calform.display.value;
                    var toRadian = radiansToDegree(displayValue);
                    calform.display.value = Math.round(Math.tan(toRadian)*1000.0)/1000.0;
                    }
                }
                function functionCotg() {
                    if (calform.valshift.value == "2nd"){
                        if (calform.display.value % 180 == 0) {
                            calform.display.value = "Nedefinováno";
                        }
                        else {
                        var displayValue = calform.display.value;
                        var toRadian = radiansToDegree(displayValue);
                        calform.display.value = Math.round(1/Math.tan(toRadian)*1000.0)/1000.0;
                        }
                    }
                    else {
                            var displayValue = calform.display.value;
                        var result = 1;
                        for (var i = 0; i < displayValue; i++) {
                            var result = result*(displayValue-i);
                        }
                        if (calform.display.value >=0){
                        calform.display.value = result;
                        }
                        else {
                            calform.display.value = "Není definováno";
                        }
                    }
                }
                function radiansToDegree(Radian){
                        var pi = Math.PI;
                        return Radian*(pi/180);
                    }
                function x2() {
                    if (calform.valshift.value == "2nd") {
                    calform.display.value = calform.display.value*calform.display.value;
                    }
                    else {
                        calform.display.value = calform.display.value*calform.display.value*calform.display.value;
                    }
                }
                function sqr() {
                    if (calform.valshift.value == "2nd"){
                        if (calform.display.value >= 0) {
                        calform.display.value = Math.sqrt(calform.display.value);
                        }
                        else {
                            calform.display.value = "Nelze odmocnit záporné číslo";
                        }
                    }
                    else {
                        if (calform.display.value >= 0) {
                        calform.display.value = Math.cbrt(calform.display.value);
                        }
                        else {
                            calform.display.value = "Nedefinováno";
                        }
                    }
                }
                function plusminus() {
                    calform.display.value = calform.display.value*(-1);
                }
                function pi() {
                    calform.display.value = Math.PI;
                }
                function e() {
                    calform.display.value = Math.E;
                }
                function logarithm() {
                    calform.display.value = Math.log(calform.display.value);
                }
                function functionTen() {
                    var displayValue = calform.display.value;
                    var result = 1;
                    for (var i = 0; i < displayValue; i++) {
                        result = result*10;
                    }
                    calform.display.value = result;
                }
                function function1x() {
                    if (calform.display.value !=0){
                    calform.display.value = 1/calform.display.value;
                    }
                    else {
                        calform.display.value = "Nelze";
                    }

                }
                function functionxy() {
                    calform.display.value = calform.display.value + "**";
                }
                function functionproc() {
                    if (calform.valshift.value == "2nd"){
                    calform.display.value = calform.display.value/100;
                    }
                    else {
                        calform.display.value = calform.display.value/1000;
                    }
                }
    
                //2nd
    
                function functionSwitch() {
                    if (calform.valshift.value == "2nd"){
                        calform.valshift.value = "1nd";
                        calform.valproc.value = "‰";
                        calform.valsqr.value = "x^3";
                        calform.valsqrt.value = "3√x";
                        calform.valcot.value = "x!";
                    }
                    else {
                        calform.valshift.value = "2nd";
                        calform.valproc.value = "%";
                        calform.valsqr.value = "x^2";
                        calform.valsqrt.value = "√x";
                        calform.valcot.value = "cotg";
                    }
                }
    
            </script>
            <div class="cal-but">
                
            </div>
            <div class="calculator">
                <form name="calform" class="cal-form"> 
                        <input class="cal-display" type="text" name="display">
                    <div class="cal-lines">
                        <div class="cal-line">
                        <input type="button" name="vallog" value="log" onclick="logarithm()">
                        <input type="button" name="val10x" value="10^x" onclick="functionTen()">
                        <input type="button" name="val1x"  value="1/x" onclick="function1x()">
                        <input type="button" name="valshift" value="2nd" onclick="functionSwitch()">
                        <input type="button" name="valoff" value="off" class="cal-off">
                        
                        </div>
    
                        <div class="cal-line">
                        <!--<input type="button" name="valfakt" value="x!" onclick="fakt()">-->
                            <input type="button" name="valcot" value="cotg" onclick="functionCotg()">
                            <input type="button" name="valpi" value="π" onclick="pi()">
                            <input type="button" name="vale" value="e" onclick="e()">
                            <input type="button" name="valxy" value="x^y" onclick="functionxy()">
                            <input type="button" name="valproc" value="%" onclick="functionproc()"> 
                        </div>  
    
                        <div class="cal-line">
                            <input type="button" name="valsin" value="sin" onclick="functionSin()">
                            <input type="button" name="valcos" value="cos" onclick="functionCos()">
                            <input type="button" name="valtan" value="tan" onclick= "functionTan()">
                            <input type="button" name="valsqr" value="x^2" onclick="x2()">
                            <input type="button" name="valsqrt" value="√x" onclick="sqr()">
                        </div>
    
                        <div class="cal-line">
                            <input type="button" name="val7" value="7" onclick="cclick('7')"> 
                            <input type="button" name="val8" value="8" onclick="cclick('8')"> 
                            <input type="button" name="val9" value="9" onclick="cclick('9')">
                            <input type="button" name="valDel" value="DEL" onclick="deleteValue()">
                            <input type="button" name="valAc" value="AC" onclick="ac()">
                        </div>
    
                        <div class="cal-line">
                            <input type="button" name="val4" value="4" onclick="cclick('4')"> 
                            <input type="button" name="val5" value="5" onclick="cclick('5')"> 
                            <input type="button" name="val6" value="6" onclick="cclick('6')"> 
                            <input type="button" name="valminus" value="-" onclick="cclick('-')">
                            <input type="button" name="valplus" value="+" onclick="cclick('+')">
                        </div>
    
                        <div class="cal-line">
                            <input type="button" name="val1" value="1" onclick="cclick('1')"> 
                            <input type="button" name="val2" value="2" onclick="cclick('2')"> 
                            <input type="button" name="val3" value="3" onclick="cclick('3')"> 
                            <input type="button" name="valmult" value="*" onclick="cclick('*')">
                            <input type="button" name="valdiv" value="/" onclick="cclick('/')"> 
                        </div>
    
                        <div class="cal-line">
                            <input type="button" name="valzero" value="0" onclick="cclick('0')"> 
                            <input type="button" name="val2zero" value="00" onclick="cclick('00')"> 
                            <input type="button" name="valdot" value="." onclick="cclick('.')"> 
                            <input type="button" name="valchange" value="+/-" onclick="plusminus()">
                            <input type="button" name="valequal" value="=" onclick="equal()"> 
                        </div>
                    </div>
                </form>
            </div>
        </section>