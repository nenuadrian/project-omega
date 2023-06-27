export interface APIResponse<T> {
  status: number;
  data: T;
}

export interface Checkout {
  url: string;
}

export interface User {
  username: string;
  group_id: number;
}
