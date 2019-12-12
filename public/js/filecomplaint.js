      function myFunction() {
        var checkBox = document.getElementById("mycheckbox");
        var checkBox1 = document.getElementById("mycheckbox1");
        var checkBox2 = document.getElementById("mycheckbox2");
        var checkBox3 = document.getElementById("mycheckbox3");
        var checkBox4 = document.getElementById("mycheckbox4");
        var checkBox5 = document.getElementById("mycheckbox5");
        
        var text = document.getElementById("text");
1    
    
        if ((checkBox.checked == true) || (checkBox1.checked == true) || (checkBox2.checked == true) || (checkBox3.checked == true) || (checkBox4.checked == true) || (checkBox5.checked == true)){
          alert('Complaint Submitted');
        } else {
          alert('Please check atleast one checkbox');
        }
      }
    



function openPage(pageName,elmnt,color) {
  var i, complaintinfo, selects;
  complaintinfo = document.getElementsByClassName("complaintinfo");
  for (i = 0; i < complaintinfo.length; i++) {
    complaintinfo[i].style.display = "none";
  }
  selects = document.getElementsByClassName("student_select");
  for (i = 0; i < selects.length; i++) {
    selects[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();







function complaittableforteacher(pageName,elmnt,color) {
  var i, complaintinfo, selects;
  complaintinfo = document.getElementsByClassName("complaintinfo");
  for (i = 0; i < complaintinfo.length; i++) {
    complaintinfo[i].style.display = "none";
  }
  selects = document.getElementsByClassName("selectforteacher");
  for (i = 0; i < selects.length; i++) {
    selects[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();





function student_tabbuttons(pageName,elmnt,color) {
  var i, complaintinfo, selects;
  complaintinfo = document.getElementsByClassName("complaintinfo");
  for (i = 0; i < complaintinfo.length; i++) {
    complaintinfo[i].style.display = "none";
  }
  selects = document.getElementsByClassName("student_tabbuttons");
  for (i = 0; i < selects.length; i++) {
    selects[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();