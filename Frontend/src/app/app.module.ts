import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

import { AppComponent } from './app.component';
import { AngularFontAwesomeModule} from 'angular-font-awesome';
import { SingupComponent } from './auth/singup/singup.component';
import { SinginComponent } from './auth/singin/singin.component';
import { AppRoutingModule } from './app-routing.module';
import {RouterModule} from '@angular/router';
import {HttpClientModule} from '@angular/common/http';
import {JarwisService} from './Services/jarwis.service';
import {TokenService} from './Services/token.service';
import { JwtHelperService } from '@auth0/angular-jwt';
import { HeaderComponent } from './header/header.component';
import { WelcomComponent } from './welcom/welcom.component';
import { CustomersComponent } from './customers/customers.component';
import {CustomerService} from './Services/customers.service';
import { EditCustomersComponent } from './customers/edit-customers/edit-customers.component';
import { SlidebarComponent } from './components/slidebar/slidebar.component';
import {LoaderComponent} from './loader/loader.component';
import { ProjectsComponent } from './projects/projects.component';

@NgModule({
  declarations: [
    AppComponent,
    SingupComponent,
    SinginComponent,
    HeaderComponent,
    WelcomComponent,
    CustomersComponent,
    EditCustomersComponent,
    SlidebarComponent,
    LoaderComponent,
    ProjectsComponent,
  ],
  imports: [
    BrowserModule,
    ReactiveFormsModule,
    AngularFontAwesomeModule,
    AppRoutingModule,
    RouterModule,
    HttpClientModule,
    FormsModule,
  ],
  providers: [
    JarwisService,
    TokenService,
    JwtHelperService,
    CustomerService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
