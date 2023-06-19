import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";

@Injectable()
export class AuthInterceptor implements HttpInterceptor {

    intercept(req: HttpRequest<any>,
              next: HttpHandler): Observable<HttpEvent<any>> {

        const idToken = localStorage.getItem("session_hash");

        if (idToken) {
            const cloned = req.clone({
                headers:
                  req.headers
                    .set("Authorization", idToken)
                    .set("Cache-Control", 'no-cache, no-store, must-revalidate, post-check=0, pre-check=0')
                    .set("Pragma", 'no-cache')
                    .set("Expires", '0')
            });
            return next.handle(cloned);
        }
        else {
            return next.handle(req);
        }
    }
}
