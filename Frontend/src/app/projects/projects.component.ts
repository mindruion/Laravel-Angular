import { Component, OnInit } from '@angular/core';
import {ProjectsService} from '../Services/projects.service';
import {CustomerService} from '../Services/customers.service';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements OnInit {

  constructor(private ProjectsData: ProjectsService,
              private CustomerData: CustomerService) { }
  public Projects:  object = {};
  public Customer_name: object = {};

  createRange(number) {
    const items: number[] = [];
    for (let i = 0; i < number; i++) {
      items.push(i);
    }
    return items;
  }
  onClick(number) {
    this.ProjectsData.page(number).subscribe(
      r => {this.Projects  = r;
      });
  }
  onDelete(id, index) {
    this.ProjectsData.delete(id).subscribe();
    // this.customers.data.splice(index, 1);
  }
  // getCustomerName(id) {
  //   this.CustomerData.getCustomer(id).subscribe(
  //     r => {
  //       console.log(id);
  //       console.log(r);
  //       return r;
  //     }
  //   );
  // }

  refreshData() {
    this.ProjectsData.getProjects().subscribe(
      r => {this.Projects  = r;
      });
  }
  ngOnInit() {
    this.ProjectsData.getProjects().subscribe(
      r => {this.Projects  = r;
      });
  }
}
