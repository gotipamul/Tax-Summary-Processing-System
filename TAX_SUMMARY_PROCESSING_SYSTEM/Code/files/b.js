function show(elmnt){ document.getElementById(elmnt).style.display='block';}function hide(elmnt){ document.getElementById(elmnt).style.display='none';}
function sc(elm) {var x = document.getElementsByClassName(elm);var i;for (i = 0; i < x.length; i++) {x[i].style.display='';}}function hc(elm){var x = document.getElementsByClassName(elm);var i;for (i = 0; i < x.length; i++) {x[i].style.display='none';}}
// -- Itax
function itax2122(){var age= document.getElementById('age').value; var tax; var liab; var tcredit=0; var surch=0; var ttax; var mtr=0; var ecess;
var inc = document.getElementById('tinc').value*1 - document.getElementById('ed').value*1;var opt= document.getElementById('opt').value;

if(opt=='no'){
if((age=='b60' || age=='huf')&&inc>1000000){tax=112500*1+Math.round((inc*1-1000000*1)*30/100);}
else if((age=='b60' || age=='huf')&&inc>500000&&inc<=1000000){tax=12500*1+Math.round((inc*1-500000*1)*20/100);}
else if((age=='b60' || age=='huf')&&inc>200000&&inc<=500000){tax=Math.round((inc*1-250000*1)*5/100);}
else if((age=='b60' || age=='huf')&&inc<=250000){tax=0;}
else if(age=='a60'&&inc>1000000){tax=110000*1+Math.round((inc*1-1000000*1)*30/100);}
else if(age=='a60'&&inc>500000&&inc<=1000000){tax=10000*1+Math.round((inc*1-500000*1)*20/100);}
else if(age=='a60'&&inc>250000&&inc<=500000){tax=Math.round((inc*1-300000*1)*5/100);}
else if(age=='a60'&&inc<300000){tax=0;}
else if(age=='a80'&&inc>1000000){tax=100000*1+Math.round((inc*1-1000000*1)*30/100);}
else if(age=='a80'&&inc>500000&&inc<=1000000){tax=Math.round((inc*1-500000*1)*20/100);}
else if(age=='a80'&&inc<=500000){tax=0;} 
if(age=='b60' && inc <=500000 && tax>0){tcredit=Math.round(tax)}
if(age=='a60' && inc <=500000 && tax>0){tcredit=Math.round(tax)}}
if (opt=='yes'){
if(inc > 1500000){itax=187500+(inc-1500000)*30/100;}
else if(inc<=1500000&&inc>1250000){tax=125000+((inc-1250000)*25/100);}
else if(inc<=1250000&&inc>1000000){tax=75000+((inc-1000000)*20/100);}
else if(inc<=1000000&&inc>750000){tax=37500+((inc-750000)*15/100);}
else if(inc<=750000&&inc>500000){tax=12500+((inc-500000)*10/100);}
else if(inc<=500000&&inc>25000){tax=((inc-250000)*5/100);}
else if(inc<=250000&&inc>0){tax=0;}}
if(inc<=500000&&inc>250000)tcredit=tax;
if(inc>500000){tcredit=0};
tax=tax*1-tcredit*1;
if(inc>5000000 && inc <=10000000){surch=tax*10/100;
if(surch>0 && (age=='b60'||age=='huf') && (inc*1-tax*1.10) <=3687500){ mtr=surch*1-(inc*1-3687500*1-tax*1)};
if(surch>0 && age=='a60' && (inc*1-tax*1.10) <=3690000){ mtr=surch*1-(inc*1-3690000*1-tax*1)};
if (surch>0 && age=='a80' && (inc*1-tax*1.10)<=3700000){ mtr=surch*1-(inc*1-3700000*1-tax*1)};}
if(inc>10000000){surch=tax*15/100;
if(surch>0 && (age=='b60'||age=='huf') && (inc*1-tax*1.15) <=6906250){mtr=surch*1-(inc*1-6906250*1-tax*1)};
if(surch>0 && age=='a60' && (inc*1-tax*1.15) <=6909000){mtr=surch*1-(inc*1-6909000*1-tax*1)};
if(surch>0 && age=='a80' && (inc*1-tax*1.15) <=6920000){mtr=surch*1-(inc*1-6920000*1-tax*1)};}
if(inc<=5000000){surch=0;}
surch=surch*1-mtr*1;
ttax=tax*1+surch*1;
ecess=Math.round(ttax*.04);liab=ttax*1 + ecess*1;
 document.getElementById('ninc').value=Math.round(inc);
 document.getElementById('itax').value=Math.round(tax);
 document.getElementById('surch').value=Math.round(surch);
 document.getElementById('ecess').value=Math.round(ecess);
 document.getElementById('liab').value=Math.round(liab);}