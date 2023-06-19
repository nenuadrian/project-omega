import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { first, skip } from 'rxjs';
import { APIResponse } from './types';
import { Environment } from './constants';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  loading = false;

  constructor(private http: HttpClient, route: ActivatedRoute) {
    route.queryParamMap.pipe(skip(1)).subscribe((params) => {
      if (params.has('session_hash')) {
        localStorage.setItem('session_hash', params.get('session_hash') ?? '');
        this.validateSession();
      }
    });

    if (localStorage.getItem('session_hash')) {
      this.validateSession();
    }
  }

  private validateSession() {
    this.http.get<APIResponse<any>>(Environment.HOST + '/auth/validate')
      .pipe(first()).subscribe((session) => {
        if (session.data) {
          this.loading = false;
        }
      });
  }
}
