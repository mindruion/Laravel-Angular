import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class TokenService {
  t = 'Bearer' + this.get();

  private iss = {
    login: 'http://127.0.0.1:8000/api/login',

    reigster: 'http://127.0.0.1:8000/api/registe',
};
constructor() {}
  handle(access_token) {
    this.set(access_token);
  }
  set(token) {
    localStorage.setItem('token', token.access_token);
    localStorage.setItem('user', token.user);
  }
  get() {
    return localStorage.getItem('token');
  }
  remove() {
    localStorage.removeItem('user');
    localStorage.removeItem('token');
  }
  isValid() {
    const token = this.get();
   if (token) {
     const payload = this.payload(token);
     if (payload) {
      return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
     }
   }
   return false;
  }
  payload(token) {
    const payload =  token.split('.')[1];
   return this.decode(payload);
  }

  decode(payload) {
    return JSON.parse(atob(payload));
  }
  loggedIn() {
    return this.isValid();
  }
}

