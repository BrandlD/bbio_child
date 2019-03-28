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

    //jQuery('div.woocommerce').on('click', 'input.qty', function(){
        //jQuery("[name='update_cart']").trigger("click");
        //e.preventDefault();
    //});
    let childBtn = Array.from(document.getElementsByClassName('child'))
    childBtn.map(btn => btn.addEventListener('click', function (e) {
            let el = e.target.parent ;
            while ( "child" in e.classList ) {
                    el = e.parent ;
                    console.log(e);
            }
        }
    ))

    let qtyBtn = Array.from(document.getElementsByClassName('qty-btn'))
    qtyBtn.map(btn => btn.addEventListener('click', removeItem))

    function removeItem (e) {
        let ajaxurl = e.target.getAttribute('data-url');
        let spec_action = e.target.getAttribute('data-action');
        let theid = e.target.getAttribute('data-item');
        console.log(e.target.dataset);
        console.log(theid);
        let restUrl = "action=add_remove&spec_action="+spec_action+"&theid="+theid;

        console.log('processed');
        document.getElementById("card-"+theid).classList.add('overlay');
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
            .then(data => { 
                console.log(data);
                location.reload();
            })
            .catch(err => { console.log(err) });
    }

	

});


