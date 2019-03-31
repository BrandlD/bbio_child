document.addEventListener("DOMContentLoaded",function(){
    const nav = document.querySelector('#site-navigation')
    document.addEventListener('scroll', function () {
        ( nav.offsetTop - window.scrollY  )  < 10  ? 
            nav.classList.remove('not-top')
        :
            nav.classList.add('not-top')
    })
    if (document.querySelectorAll('.testimonials-item')[0] != undefined) {
        document.querySelectorAll('.testimonials-item')[0].classList.add("active")
    }


    //map 
    
    if (document.getElementById('mapId') != null) {
        var mymap = L.map('mapId').setView([ 50.673851, 5.630031], 9);
        var circle = L.circle([ 50.673851, 5.630031], {
                color: 'green',
                radius: 30000
        }).addTo(mymap);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoiZnJhbmNvaXNwIiwiYSI6ImNqdG5jOTIydzA2MXc0NG1yMHdnYWFhdzEifQ.gcVpQb6InynMjC9L2B5mkw'
        }).addTo(mymap);
        mymap.scrollWheelZoom.disable();
        mymap.once('focus', function() { mymap.scrollWheelZoom.enable(); });
    }

    //bootstrap fucked the nav menu
    let topNavLinks = Array.from(
        document.getElementsByClassName('nav-link dropdown-toggle'));
    topNavLinks.map( link => {
        link.addEventListener('click', function () {
            window.location.href = link['href'];
        })
    })



    let childBtn = Array.from(document.getElementsByClassName('child'))
    childBtn.map(btnC => btnC.addEventListener('click', function (e) {
            let el = e.target.parentNode ;
            while ( el.classList.contains("child") ) {
                    el = el.parentNode ;
            }
            if ( el.getAttribute('data-item') != null ) {
                removeItem(el)
            }
        }
    ))

    let qtyBtn = Array.from(document.getElementsByClassName('qty-btn'))
    qtyBtn.map(btn => btn.addEventListener('click',
            function(e) { removeItem(e.target) })
    )

    function removeItem (el) {
        let ajaxurl = el.getAttribute('data-url');
        let spec_action = el.getAttribute('data-action');
        let theid = el.getAttribute('data-item');
        let restUrl = "action=add_remove&spec_action="+spec_action+"&theid="+theid;
        if (document.getElementById("card-"+theid) && theid) {
            document.getElementById("card-"+theid).classList.add('overlay');
        } else if (!document.getElementById("card-"+theid) && theid) {
            document.getElementById("overlay-general").classList.add('overlay');
        }
        fetch(ajaxurl, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.
            mode: "cors", // no-cors, cors, *same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            credentials: "same-origin", // include, *same-origin, omit
            headers: { "Content-Type": "application/x-www-form-urlencoded", },
            redirect: "follow", // manual, *follow, error
            referrer: "no-referrer", // no-referrer, *client
            body: restUrl
        })
            .then(resp =>  resp.text())
            .then(data => { location.reload();  })
            .catch(err => { console.log(err) });
    }

	

});


