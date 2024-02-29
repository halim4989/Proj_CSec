<style>
    .footer {
        position: fixed;
        left: 1%;
        bottom: 0;
        /* width: 100%; */
        /* background-color: rgba(0, 0, 0, 0.2);; */
        color: #3c3c3c;
        text-align: left;
        /* padding-left: 2ex; */
    }

    .footer2 {
        margin: 0;
        position: fixed;
        right: 1%;
        top: 10%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>


<div class="footer">
    <p>
        <?php
        echo "<p>Copyright &copy; 1997-" . date("Y") . " PROJ_ECOM</p>";
        ?>
    </p>

</div>

<div class="footer2">
    <p>
        <?php
        include 'UI\clock.html';
        ?>
    </p>
</div>