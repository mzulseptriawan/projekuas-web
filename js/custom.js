function myFunction() {
    var x = document.getElementById("passwordVisible");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

window.onload = function() { jam(); }

function jam() {
    var e = document.getElementById('jam'),
    d = new Date(), h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h +':'+ m +':'+ s;

    setTimeout('jam()', 1000);
}

function set(e) {
    e = e < 10 ? '0'+ e : e;
    return e;
}