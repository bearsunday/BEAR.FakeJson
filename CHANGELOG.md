# Changelog

## 0.2.0 - 2026-11-25

### Changed
- Rename the package to `bear/fake-resource` and the namespace to `BEAR\FakeResource`
- Rename `FakeJsonModule`, `FakeJsonInterceptor`, `FakeJsonInterceptorInterface` and `#[FakeJsonDir]` to `FakeResourceModule`, `FakeResourceInterceptor`, `FakeResourceInterceptorInterface` and `#[FakeResourceDir]`

## 0.1.0 - 2026-01-07

Initial release as BEAR.FakeJson.

### Features
- Fake BEAR.Resource responses with JSON files for frontend development
- AOP interceptor for ResourceObject methods starting with `on`
- `JsonFileException` for JSON parse error handling
- Support for `fake-app` context pattern
