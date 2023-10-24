{{- define "ingress.template" -}}
apiVersion: networking.k8s.io/v1
kind: Ingress
metadata:
  name: {{ .service.name | quote }}
spec:
  rules:
    - host: {{ .service.host | quote }}
      http:
        paths:
          - path: /
            pathType: Prefix
            backend:
              service:
                name: {{ .service.name | quote }}
                port:
                  number: {{ .service.port }}
{{- end -}}