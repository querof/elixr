<nav class="navbar-default navbar-static-side " role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            @include('userconected')

            <li class="">

                <a href="index.html"><i class=""></i> <span class="nav-label">EliXr</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('qrcode.index') }}">QRCode</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('fileReference.index') }}">Media</a></li>
                </ul>
            </li>


            <li class="landing_link">
                <a target="_blank" href=""><i class="fa fa-star"></i> <span class="nav-label">Data Pipe</span> <span class="label label-warning pull-right">Hire me!</span></a>
            </li>
            <li class="special_link">
                <a href=""><i class="fa fa-database"></i> <span class="nav-label">Main Option</span></a>
            </li>
        </ul>

    </div>
</nav>
