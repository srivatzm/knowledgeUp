	function getAjax() {
      var ajax;
      if (window.XMLHttpRequest) {
        ajax = new XMLHttpRequest();
      } else {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
      }
      return ajax;
    }

    function loadSearchAjax() {
      var ajaxHandle = getAjax();
      ajaxHandle.open("GET", "Test.html", true);
      ajaxHandle.onreadystatechange = function() {
        if (ajaxHandle.status == 200 && ajaxHandle.readyState == 4) {
          document.getElementById("searchDiv").innerHTML = ajaxHandle.responseText;
        }
      }
      ajaxHandle.send();
    }

    function counter() {
      if (typeof(Storage) !== "undefined") {
        if (sessionStorage.counter) {
          sessionStorage.counter = Number(sessionStorage.counter) + 1;
        } else {
          sessionStorage.counter = 1;
        }
        if (sessionStorage.counter > 1) {
          document.getElementById("number").innerHTML = "<p>The Button Clicked " + sessionStorage.counter + " times.</p>";
        }
      }
    }

    function myLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPos);
      }
    }

    function showPos(pos) {
      var myloc = document.getElementById("myloc");
      myloc.innerHTML = "Latitude=" + pos.coords.latitude +
        "<br/>Longitude=" + pos.coords.longitude;
    }

    function allowDrop(e) {
      e.preventDefault();
    }

    function drag(e) {
      e.dataTransfer.setData("text", e.target.id);
    }

    function drop(e) {
      e.preventDefault();
      d = e.dataTransfer.getData("text");
      e.target.appendChild(document.getElementById(d));
    }

    function playOrPause() {
      if (road.paused)
        road.play();
      else
        road.pause();
    }

    function normalSize() {
      road.width = 150;
    }

    function largeSize() {
      road.width = 200;
    }
	
	function convert(type) {
		var value = document.getElementById('inp').value;
		if(type == 'u') {			
			value = value.toUpperCase();
		} else {
			value = value.toLowerCase();
		}
		document.getElementById('out').value=value;
	}
	
	//Marquee by Interval
	var colArr = 
	{
		c0: "blue",
		c1: "orange",
		c2: "violet",
		c3: "yellow",
		c4: "pink",
		c5: "black",
		c6: "brown"
	}  
	var pos=0;
	var move=100;
	var sign = 1;	
	var intvl=setInterval(function(){marquee()},1000);
	var colId = "c0";
	function marquee() {
	pos = pos + move*sign;
	if(pos>=600) {
	sign = -1;
	}
	if(pos<=0) {
	sign = 1;
	}
	colId = "c"+pos/100;
	let col = colArr[colId];
	document.getElementById("marq").style.color = col;
	document.getElementById("marq").style.left = pos+"px";
	}