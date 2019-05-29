import { Injectable } from '@angular/core';
import {ActivatedRouteSnapshot, CanActivate, RouterStateSnapshot} from '@angular/router';
import {Observable} from 'rxjs';
import {TokenService} from '../Services/token.service';

@Injectable({
  providedIn: 'root'
})
export class AfterLoginService implements CanActivate {


  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    return this.Token.loggedIn();
  }
  constructor(private Token: TokenService) {}
}
