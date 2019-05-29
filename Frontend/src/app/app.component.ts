import {Component, OnInit} from '@angular/core';
import {AuthService} from './Services/auth.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{

  public loggedIn: boolean;
  constructor(private Auth: AuthService) { }

  ngOnInit() {
    this.Auth.authStatus.subscribe(
      value => this.loggedIn = value
    );
  }


}
