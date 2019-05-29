import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class JarwisService {
  constructor(private http: HttpClient) {
  }

  login(email: string, password: string ) {
    return this.http.post('http://127.0.0.1:8000/api/login', {email, password});
  }
  register(name: string, email: string, password: string) {
    return this.http.post('http://127.0.0.1:8000/api/register', {name, email, password});
  }
}
