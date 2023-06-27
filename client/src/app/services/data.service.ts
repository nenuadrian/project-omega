import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { User } from '../types';

@Injectable()
export class DataService {
  private userSource = new BehaviorSubject<User | undefined>(undefined);
  currentUser = this.userSource.asObservable();

  constructor() {}

  updateUser(user: User) {
    this.userSource.next(user);
  }
}
