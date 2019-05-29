import { NgModule } from '@angular/core';
import { RouterModule, Routes} from '@angular/router';
import {SinginComponent} from './auth/singin/singin.component';
import {SingupComponent} from './auth/singup/singup.component';
import {BeforeLoginService} from './services/before-login.service';
import {WelcomComponent} from './welcom/welcom.component';
import {CustomersComponent} from './customers/customers.component';
import {AfterLoginService} from './services/after-login.service';
import {ProjectsComponent} from './projects/projects.component';

const appRoutes: Routes = [
  {path: 'login', component: SinginComponent, canActivate: [BeforeLoginService]},
  {path: 'register', component: SingupComponent, canActivate: [BeforeLoginService]},
  {path: '**', redirectTo: 'home', pathMatch: 'full' },
  {path: 'welcome', component: WelcomComponent},
  {path: 'customers', component: CustomersComponent, canActivate: [AfterLoginService]},
  {path: 'projects', component: ProjectsComponent, canActivate: [AfterLoginService]}
];

@NgModule({
  imports: [
    RouterModule.forRoot(appRoutes)
  ],
  declarations: []
})
export class AppRoutingModule { }
