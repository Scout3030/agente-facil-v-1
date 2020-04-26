<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">Transacciones</li>
            <li>
                <a href="{{route('admin.operation.index')}}" @if (Request::url() == route('admin.operation.index')) class="mm-active" @endif>
                    <i class="metismenu-icon pe-7s-play"></i>
                    En proceso
                    <i class="metismenu-state-icon caret-left"></i>
                </a>
            </li>
            <li>
                <a href="{{route('admin.operation.all')}}" @if (Request::url() == route('admin.operation.all')) class="mm-active" @endif>
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Todas
                    <i class="metismenu-state-icon caret-left"></i>
                </a>
            </li>
            <li class="app-sidebar__heading">Bancos</li>
            <li>
                <a href="{{route('admin.bank.index')}}" @if (Request::url() == route('admin.bank.index')) class="mm-active" @endif>
                    <i class="metismenu-icon pe-7s-menu"></i>
                    Administrar
                    <i class="metismenu-state-icon caret-left"></i>
                </a>
            </li>
            <li class="app-sidebar__heading">Convenios</li>
            <li>
                <a href="{{route('admin.payment.index')}}" @if (Request::url() == route('admin.payment.index')) class="mm-active" @endif>
                    <i class="metismenu-icon pe-7s-piggy"></i>
                    Administrar
                    <i class="metismenu-state-icon caret-left"></i>
                </a>
            </li>
            <li class="app-sidebar__heading">Preguntas frecuentes</li>
            <li>
                <a href="{{route('admin.faq.index')}}" @if (Request::url() == route('admin.faq.index')) class="mm-active" @endif>
                    <i class="metismenu-icon pe-7s-attention"></i>
                    Administrar
                    <i class="metismenu-state-icon caret-left"></i>
                </a>
            </li>
            <li class="app-sidebar__heading">PRO Version</li>
            <li>
                <a href="https://demo.dashboardpack.com/architectui-html-pro/" target="_blank">
                    <i class="metismenu-icon pe-7s-graph2">
                    </i>
                    Upgrade to PRO
                </a>
            </li>
        </ul>
    </div>
</div>