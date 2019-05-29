import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {TokenService} from './token.service';

@Injectable({
  providedIn: 'root'
})
export class CustomerService {

  constructor(private http: HttpClient,
              private token: TokenService) { }
  getCustomers() {
    return this.http.get('http://127.0.0.1:8000/api/customers', {headers: new HttpHeaders().set('Authorization',
        this.token.t)});
  }
  getCustomer(id) {
    return this.http.get('http://127.0.0.1:8000/api/customers/' + id, {headers: new HttpHeaders().set('Authorization',
        this.token.t)});
  }

  delete(id) {
    return this.http.delete('http://127.0.0.1:8000/api/customers/' + id, {headers: new HttpHeaders().set('Authorization',
        this.token.t)});
  }

  page(number) {
    return this.http.get('http://127.0.0.1:8000/api/customers?page=' + (number), {headers: new HttpHeaders().set('Authorization',
        this.token.t)});
  }
  edit(full_name: string, company: string, domain: string, email: string, phone: number, id: number) {
    return this.http.put('http://127.0.0.1:8000/api/customers/' + id, {full_name, company, domain, email, phone},
      {headers: new HttpHeaders().set('Authorization', this.token.t)});
  }
}
