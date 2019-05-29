import {Component, Input, OnInit} from '@angular/core';
import {FormBuilder, FormGroup} from '@angular/forms';
import {CustomerService} from '../../Services/customers.service';
import {CustomersComponent} from '../customers.component';



@Component({
  selector: 'app-edit-customers',
  templateUrl: './edit-customers.component.html',
  styleUrls: ['./edit-customers.component.scss']
})
export class EditCustomersComponent implements OnInit {

  @Input() editNumber: any;
  editedCustomer: FormGroup;
  constructor(private formBuilder: FormBuilder,
              private Edit: CustomerService,
              private router: CustomersComponent
  ) {
    this.editedCustomer = this.formBuilder.group({
      full_name : [''],
      company : [''],
      domain : [''],
      email : [''],
      phone : ['']
      });
  }
  get f() { return this.editedCustomer.controls; }

  onSubmit() {
    console.log(this.editNumber);
    this.Edit.edit(this.f.full_name.value, this.f.company.value, this.f.domain.value,
      this.f.email.value, this.f.phone.value, this.editNumber).subscribe(r => console.log(r));
  }
  finish(){
    this.router.refreshData();
  }
  ngOnInit() {
  }

}
