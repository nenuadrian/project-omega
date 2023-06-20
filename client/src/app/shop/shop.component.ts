import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { catchError, first, of } from 'rxjs';
import {Checkout, APIResponse} from '../types'
import { Environment } from '../constants';


@Component({
  selector: 'app-shop',
  templateUrl: './shop.component.html',
  styleUrls: ['./shop.component.scss']
})
export class ShopComponent {
  loading = false;

  constructor(private http: HttpClient) {
  }

  checkout() {
    this.loading = true;
    this.http.get<APIResponse<Checkout>>(Environment.HOST + '/shop/checkout')
      .pipe(first(), catchError((error) => { return of(undefined); }))
      .subscribe((checkout) => {
        if (checkout) {
          window.open(checkout.data.url, "_blank");
        }
        this.loading = false;
      });
  }
}
