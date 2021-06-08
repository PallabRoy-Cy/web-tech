function validateForm() {
    var fn = document.getElementById("fname").value;
    var ln = document.getElementById("lname").value;
    var bd = document.getElementById("birthday").value;
    var ads = document.getElementById("adds").value;
    var cnty = document.getElementById("country").value;
    var cty = document.getElementById("city").value;
    var st = document.getElementById("state").value;
    var zp = document.getElementById("zip").value;
    var em = document.getElementById("email").value;
    
    if (fn == "" || fn == null) {
      alert("Fast Name must be filled out");
      return false;
    }else if(ln == "" || ln == null)
    {
        alert("Last Name must be filled out");
        return false;
    }else if(ln == "" || ln == null)
    {
        alert("Last Name must be filled out");
        return false;
    }else if(bd == "" || bd == null)
    {
        alert("Birthday must be filled out");
        return false;
    }else if(ads == "" || ads == null)
    {
        alert("Address must be filled out");
        return false;
    }else if(cnty == "" || cnty == null)
    {
        alert("Country must be filled out");
        return false;
    }else if(cty == "" || cty == null)
    {
        alert("City must be filled out");
        return false;
    }else if(st == "" || st == null)
    {
        alert("State must be filled out");
        return false;
    }else if(zp == "" || zp == null)
    {
        alert("Zip code must be filled out");
        return false;
    }else if(em == "" || em == null)
    {
        alert("Email must be filled out");
        return false;
    }else if(tp.checked==false)
    {
        alert("Terms & Conditions must be checked");
        return false;
    }else if(pp.checked==false)
    {
        alert("Privacy & Policy must be checked");
        return false;
    }else{
        alert('Successfully Submited');
        return true;
    }
    }