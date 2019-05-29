import {Component, Injectable, OnInit} from '@angular/core';
import {CustomerService} from '../Services/customers.service';

@Component({
  selector: 'app-customers',
  templateUrl: './customers.component.html',
  styleUrls: ['./customers.component.scss']
})

export class CustomersComponent implements OnInit {
  constructor(private CustomersData: CustomerService) { }
  public customers:  object = {};
  public number: any = 0;

  createRange(number) {
    const items: number[] = [];
    for (let i = 0; i < number; i++) {
      items.push(i);
    }
    return items;
  }
  onClick(number) {
    this.CustomersData.page(number).subscribe(
      r => {this.customers  = r;
      });
  }
  onDelete(id, index) {
    this.CustomersData.delete(id).subscribe();
     // this.customers.data.splice(index, 1);
  }
  getNumber(id) {
    this.number = id;
    console.log(id);
  }
  refreshData() {
    this.CustomersData.getCustomers().subscribe(
      r => {this.customers  = r;
      });
  }
  ngOnInit() {
  this.CustomersData.getCustomers().subscribe(
    r => {this.customers  = r;
    });
  }
}
