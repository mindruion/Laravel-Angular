import {Component, OnInit, ViewEncapsulation} from '@angular/core';

@Component({
  selector: 'app-welcom',
  templateUrl: './welcom.component.html',
  styleUrls: ['./welcom.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class WelcomComponent implements OnInit {

 user = localStorage.getItem('user');
 point ;
  constructor() { }

  ngOnInit() {
    for (let i = 1; i <= 100; i++) {
      this.point += '<div class="point-' + i + '"></div>';
    }
  }

}
