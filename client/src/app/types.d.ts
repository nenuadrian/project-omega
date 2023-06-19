export interface APIResponse<T> {
  status: number,
  data: T
}

export interface Checkout {
  url: string;
}
