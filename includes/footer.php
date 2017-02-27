        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="js/velocity.js"></script>
        <script src="js/muuri.js"></script>
        <script>
        var grid = new Muuri({
            container: document.getElementsByClassName('grid')[0],
            // Muuri does not convert a node list to array automatically
            // so we have to do it manually.
            items: [].slice.call(document.getElementsByClassName('item'))
        });
        </script>
    </body>
</html>