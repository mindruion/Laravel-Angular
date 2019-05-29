import { Component, OnInit } from '@angular/core';
import {AuthService} from '../Services/auth.service';
import {Router} from '@angular/router';
import {TokenService} from '../Services/token.service';


@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit{
  public loggedIn: boolean;

  constructor(
    private Auth: AuthService,
    private router: Router,
    private Token: TokenService,
  ) {}


  ngOnInit() {
    this.Auth.authStatus.subscribe(
      value => this.loggedIn = value
    );
  }
  loggout(Event: MouseEvent) {
    event.preventDefault();
    this.Token.remove();
    this.Auth.changeAuthStatus(false);
    this.router.navigateByUrl('/login');
  }
}

