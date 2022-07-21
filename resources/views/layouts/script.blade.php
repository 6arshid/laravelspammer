
<script type="text/javascript">

    function submit_action_worldometers() {
        console.log("modal opened"); 
        $("#worldometers").modal("show");
        event.preventDefault();
    }
    function submit_action_randusers() {
        console.log("modal opened"); 
        $("#randusers").modal("show");
        event.preventDefault();
    }
    function submit_action_spotify() {
        console.log("modal opened"); 
        $("#spotify").modal("show");
        event.preventDefault();
    }
    function submit_action_youtubelives() {
        console.log("modal opened"); 
        $("#youtubelives").modal("show");
        event.preventDefault();
    }
    function submit_action_allcontents() {
        console.log("modal opened"); 
        $("#allcontents").modal("show");
        event.preventDefault();
    }
    function submit_action_nfts() {
        console.log("modal opened"); 
        $("#nfts").modal("show");
        event.preventDefault();
    }
    function submit_action_market() {
        console.log("modal opened"); 
        $("#market").modal("show");
        event.preventDefault();
    }
    function submit_action_ccp() {
        console.log("modal opened"); 
        $("#ccp").modal("show");
        event.preventDefault();
    }
    

    
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    $(document).ready(function () {
 
        $("#fetch_worldometers").click(function () {
            $.ajax({
                url: "/s/worldometers",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createworldometers(response);
                },
            });
        });
        $("#fetch_randusers").click(function () {
            $.ajax({
                url: "/s/users/ajax",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createrandusers(response);
                },
            });
        });
        $("#fetch_spotify").click(function () {
            $.ajax({
                url: "/s/spotify",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createspotify(response);
                },
            });
        });

        $("#fetch_youtubelives").click(function () {
            $.ajax({
                url: "/s/youtubelives/ajax",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createyoutubelives(response);
                },
            });
        });
        $("#fetch_allcontents").click(function () {
            $.ajax({
                url: "/s/allcontents/ajax",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createallcontents(response);
                },
            });
        });
        $("#fetch_nfts").click(function () {
            $.ajax({
                url: "/s/nfts/ajax",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createnfts(response);
                },
            });
        });
        $("#fetch_ccp").click(function () {
            $.ajax({
                url: "/s/ccp/ajax",
                type: "get",
                dataType: "json",
                success: function (response) {
                    createccp(response);
                },
            });
        });
        

        

    });

    

    function createworldometers(response) {
        var len = 0;
        $("#worldometers section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='https://www.worldometers.info/' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#worldometers section").append(tr_str);
    }
    function createrandusers(response) {
        var len = 0;
        $("#randusers section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='{{url('/')}}/s/users/ajaxview' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#randusers section").append(tr_str);
    }
    function createspotify(response) {
        var len = 0;
        $("#spotify section").empty(); // Empty
        var tr_str =
            "<div>" +
            "<iframe  src='https://open.spotify.com/embed/playlist/37i9dQZF1DXcBWIGoYBM5M?utm_source=generator&theme=0' width='100%' height='480' frameBorder='0' allowfullscreen='' allow='autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture'></iframe>" +
            "</div>";
        $("#spotify section").append(tr_str);
    }
    function createyoutubelives(response) {
        var len = 0;
        $("#youtubelives section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='{{url('/')}}/s/youtubelives/ajaxview' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#youtubelives section").append(tr_str);
    }
    function createallcontents(response) {
        var len = 0;
        $("#allcontents section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='{{url('/')}}/s/allcontents/ajaxview' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#allcontents section").append(tr_str);
    }
    function createnfts(response) {
        var len = 0;
        $("#nfts section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='{{url('/')}}/s/nfts/ajaxview' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#nfts section").append(tr_str);
    }
    function createmarket(response) {
        var len = 0;
        $("#market section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='{{url('/')}}/s/market/ajaxview' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#market section").append(tr_str);
    }
    function createccp(response) {
        var len = 0;
        $("#ccp section").empty(); // Empty
        var tr_str = "<div>" + "<iframe width='100%' height='615' src='{{url('/')}}/s/ccp/ajaxview' frameborder='0' allowfullscreen></iframe>" + "</div>";
        $("#ccp section").append(tr_str);
    }
   

</script>
