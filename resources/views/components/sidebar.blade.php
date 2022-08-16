<aside class="control-sidebar control-sidebar-dark">

    <div class="bg-dark">
        <div class="card-body bg-dark">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/profile.png') }}"
                    alt="User profile picture">
            </div>
            <h3 class="profile-username text-center ellipsis">{{ userFulName() }}</h3>
            <p class="text-muted text-center">
                {{ getRolesName() }}</p>
            <ul class="list-group bg-dark mb-3">
                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center">
                        <i class="fa fa-loack pr-2"></i></i>
                        <b>Mot de passe</b>
                        </b>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center">
                        <i class="fa fa-user pr-2"></i></i><b>Mon Profile</b></a>
                </li>

            </ul>
            <a href="{{ route('app_logout') }}" class="btn btn-primary btn-block"><b>Déconnexion</b></a>
        </div>

    </div>
</aside>
