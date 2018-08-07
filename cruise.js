    var offset = 5;


    // When the user scrolls down 50px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("scroll").style.display = "block";
        } else {
            document.getElementById("scroll").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    

document.querySelector("#loadMore").addEventListener("click", function() {
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
      var rows = JSON.parse(this.responseText);
      for (var i = 0; i < rows.length; i++){
          total++;
          var html = '<br><div class="resultContainer" id="results">'
                + '<div class="right-side" style="float:right;">'
                    + '<div class="cruiseLineName">'
                        + rows[i][2] 
                        +  '<br><br>'
                    + '</div>'
                    + '<div class="priceArea">'
                        + 'From <br>'
                        + '<div class="price">'
                            + '&pound;' + rows[i][4]  
                            + 'pp'
                        + '</div><br>'
                    + '</div>'
                    + '<button>View Details &#x25B6;</button> <br><br>'
                + '</div>'
                + '<div class="result">'
                    + '<h1>' + rows[i][5] 
                    + '</h1>'
                    + '<div class="resultDetails">'
                        + rows[i][0] 
                        + '<small>' + rows[i][1] + '</small>'
                        + '<p>' + rows[i][3] + '</p>' 
                    + '</div><br><br>'
                + '</div>'
         + '</div><br>';
           
        var elems = document.querySelectorAll(".resultContainer");
        elems[elems.length - 1].insertAdjacentHTML('afterend', html);
 
        }
        
       
        if (offset >= total){
            document.getElementById('loadMore').style.display = "none";
        }
    }
  };
  xhttp.open("GET", "SearchResults.php?next="+offset, true);
  xhttp.send();
  
});
