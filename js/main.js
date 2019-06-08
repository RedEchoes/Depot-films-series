/* RECHERCHE AJAX */
var valueText = document.getElementById('search');
var resultsSpan = document.getElementsByClassName('search-results');
var form = document.querySelector('search');

xhr = new XMLHttpRequest()

valueText.addEventListener('keyup', function () {
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        var resultat = [];
        var element = document.getElementById("search-results");
        element.classList.add("search-results");
        resultsSpan.className + 'search-results'
        var results = JSON.parse(this.responseText)
        for (let i = 0; i < results.length; i++) {
          resultat.push('<li>' + results[i].titre + '</li>');
        }
        resultat = resultat.join(' ');
        resultsSpan[0].innerHTML = resultat;
      } else {
        console.log('Error', xhr.statusText)
      }
      $("#search-results").on( "click", "li", function() {
        for (let i = 0; i < results.length; i++) {
        window.location='recherche.php?search='+$(this).text();   
      }
      })
    }
  }
  if (valueText.value == "") {
    resultsSpan[0].innerHTML = "";
    $('#search-results').removeClass('search-results');
  } else {
    xhr.open("GET", "search.php?search=" + valueText.value, true);
    xhr.send(null);
  }
});

/* SYSTEME DE LIKES */
$('.like, .no-like').click(function (e) {
  $(this).toggleClass('no-like');
  $(this).toggleClass('like');
  var likeId = e.currentTarget.dataset.id;
  var likeType = e.currentTarget.dataset.type;
  $.ajax({
    url: 'likes.php',
    method: 'GET',
    data: {
      likeId: likeId,
      likeType: likeType
    }
  })
});

