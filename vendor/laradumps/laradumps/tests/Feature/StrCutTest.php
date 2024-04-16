
<?php

it('properly cuts dump string')
    ->expect(fn () => \LaraDumps\LaraDumpsCore\Actions\Support::cut(htmlDumper(), '<pre ', '</pre>'))
    ->toBe(htmlDump());

// Helpers

function htmlDumper(): string
{
    $html = <<< END
    PHNjcmlwdD4gU2ZkdW1wID0gd2luZG93LlNmZHVtcCB8fCAoZnVuY3Rpb24gKGRvYykgeyB2YXIgcmVmU3R5bGUgPSBkb2MuY3JlYXRlRWxlbWVudCgnc3R5bGUnKSwgcnhFc2MgPSAvKFsuKis/XiR7fSgpfFxbXF1cL1xdKS9nLCBpZFJ4ID0gL3NmLWR1bXAtXGQrLXJlZlswMTJdXHcrLywga2V5SGludCA9IDAgPD0gbmF2aWdhdG9yLnBsYXRmb3JtLnRvVXBwZXJDYXNlKCkuaW5kZXhPZignTUFDJykgPyAnQ21kJyA6ICdDdHJsJywgYWRkRXZlbnRMaXN0ZW5lciA9IGZ1bmN0aW9uIChlLCBuLCBjYikgeyBlLmFkZEV2ZW50TGlzdGVuZXIobiwgY2IsIGZhbHNlKTsgfTsgcmVmU3R5bGUuaW5uZXJIVE1MID0gJ3ByZS5zZi1kdW1wIC5zZi1kdW1wLWNvbXBhY3QsIC5zZi1kdW1wLXN0ci1jb2xsYXBzZSAuc2YtZHVtcC1zdHItY29sbGFwc2UsIC5zZi1kdW1wLXN0ci1leHBhbmQgLnNmLWR1bXAtc3RyLWV4cGFuZCB7IGRpc3BsYXk6IG5vbmU7IH0nOyAoZG9jLmRvY3VtZW50RWxlbWVudC5maXJzdEVsZW1lbnRDaGlsZCB8fCBkb2MuZG9jdW1lbnRFbGVtZW50LmNoaWxkcmVuWzBdKS5hcHBlbmRDaGlsZChyZWZTdHlsZSk7IHJlZlN0eWxlID0gZG9jLmNyZWF0ZUVsZW1lbnQoJ3N0eWxlJyk7IChkb2MuZG9jdW1lbnRFbGVtZW50LmZpcnN0RWxlbWVudENoaWxkIHx8IGRvYy5kb2N1bWVudEVsZW1lbnQuY2hpbGRyZW5bMF0pLmFwcGVuZENoaWxkKHJlZlN0eWxlKTsgaWYgKCFkb2MuYWRkRXZlbnRMaXN0ZW5lcikgeyBhZGRFdmVudExpc3RlbmVyID0gZnVuY3Rpb24gKGVsZW1lbnQsIGV2ZW50TmFtZSwgY2FsbGJhY2spIHsgZWxlbWVudC5hdHRhY2hFdmVudCgnb24nICsgZXZlbnROYW1lLCBmdW5jdGlvbiAoZSkgeyBlLnByZXZlbnREZWZhdWx0ID0gZnVuY3Rpb24gKCkge2UucmV0dXJuVmFsdWUgPSBmYWxzZTt9OyBlLnRhcmdldCA9IGUuc3JjRWxlbWVudDsgY2FsbGJhY2soZSk7IH0pOyB9OyB9IGZ1bmN0aW9uIHRvZ2dsZShhLCByZWN1cnNpdmUpIHsgdmFyIHMgPSBhLm5leHRTaWJsaW5nIHx8IHt9LCBvbGRDbGFzcyA9IHMuY2xhc3NOYW1lLCBhcnJvdywgbmV3Q2xhc3M7IGlmICgvc2YtZHVtcC1jb21wYWN0Ly50ZXN0KG9sZENsYXNzKSkgeyBhcnJvdyA9ICcmIzk2NjA7JzsgbmV3Q2xhc3MgPSAnc2YtZHVtcC1leHBhbmRlZCc7IH0gZWxzZSBpZiAoL3NmLWR1bXAtZXhwYW5kZWQvLnRlc3Qob2xkQ2xhc3MpKSB7IGFycm93ID0gJyYjOTY1NDsnOyBuZXdDbGFzcyA9ICdzZi1kdW1wLWNvbXBhY3QnOyB9IGVsc2UgeyByZXR1cm4gZmFsc2U7IH0gaWYgKGRvYy5jcmVhdGVFdmVudCAmJiBzLmRpc3BhdGNoRXZlbnQpIHsgdmFyIGV2ZW50ID0gZG9jLmNyZWF0ZUV2ZW50KCdFdmVudCcpOyBldmVudC5pbml0RXZlbnQoJ3NmLWR1bXAtZXhwYW5kZWQnID09PSBuZXdDbGFzcyA/ICdzZmJlZm9yZWR1bXBleHBhbmQnIDogJ3NmYmVmb3JlZHVtcGNvbGxhcHNlJywgdHJ1ZSwgZmFsc2UpOyBzLmRpc3BhdGNoRXZlbnQoZXZlbnQpOyB9IGEubGFzdENoaWxkLmlubmVySFRNTCA9IGFycm93OyBzLmNsYXNzTmFtZSA9IHMuY2xhc3NOYW1lLnJlcGxhY2UoL3NmLWR1bXAtKGNvbXBhY3R8ZXhwYW5kZWQpLywgbmV3Q2xhc3MpOyBpZiAocmVjdXJzaXZlKSB7IHRyeSB7IGEgPSBzLnF1ZXJ5U2VsZWN0b3JBbGwoJy4nK29sZENsYXNzKTsgZm9yIChzID0gMDsgcyA8IGEubGVuZ3RoOyArK3MpIHsgaWYgKC0xID09IGFbc10uY2xhc3NOYW1lLmluZGV4T2YobmV3Q2xhc3MpKSB7IGFbc10uY2xhc3NOYW1lID0gbmV3Q2xhc3M7IGFbc10ucHJldmlvdXNTaWJsaW5nLmxhc3RDaGlsZC5pbm5lckhUTUwgPSBhcnJvdzsgfSB9IH0gY2F0Y2ggKGUpIHsgfSB9IHJldHVybiB0cnVlOyB9OyBmdW5jdGlvbiBjb2xsYXBzZShhLCByZWN1cnNpdmUpIHsgdmFyIHMgPSBhLm5leHRTaWJsaW5nIHx8IHt9LCBvbGRDbGFzcyA9IHMuY2xhc3NOYW1lOyBpZiAoL3NmLWR1bXAtZXhwYW5kZWQvLnRlc3Qob2xkQ2xhc3MpKSB7IHRvZ2dsZShhLCByZWN1cnNpdmUpOyByZXR1cm4gdHJ1ZTsgfSByZXR1cm4gZmFsc2U7IH07IGZ1bmN0aW9uIGV4cGFuZChhLCByZWN1cnNpdmUpIHsgdmFyIHMgPSBhLm5leHRTaWJsaW5nIHx8IHt9LCBvbGRDbGFzcyA9IHMuY2xhc3NOYW1lOyBpZiAoL3NmLWR1bXAtY29tcGFjdC8udGVzdChvbGRDbGFzcykpIHsgdG9nZ2xlKGEsIHJlY3Vyc2l2ZSk7IHJldHVybiB0cnVlOyB9IHJldHVybiBmYWxzZTsgfTsgZnVuY3Rpb24gY29sbGFwc2VBbGwocm9vdCkgeyB2YXIgYSA9IHJvb3QucXVlcnlTZWxlY3RvcignYS5zZi1kdW1wLXRvZ2dsZScpOyBpZiAoYSkgeyBjb2xsYXBzZShhLCB0cnVlKTsgZXhwYW5kKGEpOyByZXR1cm4gdHJ1ZTsgfSByZXR1cm4gZmFsc2U7IH0gZnVuY3Rpb24gcmV2ZWFsKG5vZGUpIHsgdmFyIHByZXZpb3VzLCBwYXJlbnRzID0gW107IHdoaWxlICgobm9kZSA9IG5vZGUucGFyZW50Tm9kZSB8fCB7fSkgJiYgKHByZXZpb3VzID0gbm9kZS5wcmV2aW91c1NpYmxpbmcpICYmICdBJyA9PT0gcHJldmlvdXMudGFnTmFtZSkgeyBwYXJlbnRzLnB1c2gocHJldmlvdXMpOyB9IGlmICgwICE9PSBwYXJlbnRzLmxlbmd0aCkgeyBwYXJlbnRzLmZvckVhY2goZnVuY3Rpb24gKHBhcmVudCkgeyBleHBhbmQocGFyZW50KTsgfSk7IHJldHVybiB0cnVlOyB9IHJldHVybiBmYWxzZTsgfSBmdW5jdGlvbiBoaWdobGlnaHQocm9vdCwgYWN0aXZlTm9kZSwgbm9kZXMpIHsgcmVzZXRIaWdobGlnaHRlZE5vZGVzKHJvb3QpOyBBcnJheS5mcm9tKG5vZGVzfHxbXSkuZm9yRWFjaChmdW5jdGlvbiAobm9kZSkgeyBpZiAoIS9zZi1kdW1wLWhpZ2hsaWdodC8udGVzdChub2RlLmNsYXNzTmFtZSkpIHsgbm9kZS5jbGFzc05hbWUgPSBub2RlLmNsYXNzTmFtZSArICcgc2YtZHVtcC1oaWdobGlnaHQnOyB9IH0pOyBpZiAoIS9zZi1kdW1wLWhpZ2hsaWdodC1hY3RpdmUvLnRlc3QoYWN0aXZlTm9kZS5jbGFzc05hbWUpKSB7IGFjdGl2ZU5vZGUuY2xhc3NOYW1lID0gYWN0aXZlTm9kZS5jbGFzc05hbWUgKyAnIHNmLWR1bXAtaGlnaGxpZ2h0LWFjdGl2ZSc7IH0gfSBmdW5jdGlvbiByZXNldEhpZ2hsaWdodGVkTm9kZXMocm9vdCkgeyBBcnJheS5mcm9tKHJvb3QucXVlcnlTZWxlY3RvckFsbCgnLnNmLWR1bXAtc3RyLCAuc2YtZHVtcC1rZXksIC5zZi1kdW1wLXB1YmxpYywgLnNmLWR1bXAtcHJvdGVjdGVkLCAuc2YtZHVtcC1wcml2YXRlJykpLmZvckVhY2goZnVuY3Rpb24gKHN0ck5vZGUpIHsgc3RyTm9kZS5jbGFzc05hbWUgPSBzdHJOb2RlLmNsYXNzTmFtZS5yZXBsYWNlKC9zZi1kdW1wLWhpZ2hsaWdodC8sICcnKTsgc3RyTm9kZS5jbGFzc05hbWUgPSBzdHJOb2RlLmNsYXNzTmFtZS5yZXBsYWNlKC9zZi1kdW1wLWhpZ2hsaWdodC1hY3RpdmUvLCAnJyk7IH0pOyB9IHJldHVybiBmdW5jdGlvbiAocm9vdCwgeCkgeyByb290ID0gZG9jLmdldEVsZW1lbnRCeUlkKHJvb3QpOyB2YXIgaW5kZW50UnggPSBuZXcgUmVnRXhwKCdeKCcrKHJvb3QuZ2V0QXR0cmlidXRlKCdkYXRhLWluZGVudC1wYWQnKSB8fCAnICcpLnJlcGxhY2UocnhFc2MsICdcJDEnKSsnKSsnLCAnbScpLCBvcHRpb25zID0geyJtYXhEZXB0aCI6MSwibWF4U3RyaW5nTGVuZ3RoIjoxNjAsImZpbGVMaW5rRm9ybWF0IjpmYWxzZX0sIGVsdCA9IHJvb3QuZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ0EnKSwgbGVuID0gZWx0Lmxlbmd0aCwgaSA9IDAsIHMsIGgsIHQgPSBbXTsgd2hpbGUgKGkgPCBsZW4pIHQucHVzaChlbHRbaSsrXSk7IGZvciAoaSBpbiB4KSB7IG9wdGlvbnNbaV0gPSB4W2ldOyB9IGZ1bmN0aW9uIGEoZSwgZikgeyBhZGRFdmVudExpc3RlbmVyKHJvb3QsIGUsIGZ1bmN0aW9uIChlLCBuKSB7IGlmICgnQScgPT0gZS50YXJnZXQudGFnTmFtZSkgeyBmKGUudGFyZ2V0LCBlKTsgfSBlbHNlIGlmICgnQScgPT0gZS50YXJnZXQucGFyZW50Tm9kZS50YWdOYW1lKSB7IGYoZS50YXJnZXQucGFyZW50Tm9kZSwgZSk7IH0gZWxzZSB7IG4gPSAvc2YtZHVtcC1lbGxpcHNpcy8udGVzdChlLnRhcmdldC5jbGFzc05hbWUpID8gZS50YXJnZXQucGFyZW50Tm9kZSA6IGUudGFyZ2V0OyBpZiAoKG4gPSBuLm5leHRFbGVtZW50U2libGluZykgJiYgJ0EnID09IG4udGFnTmFtZSkgeyBpZiAoIS9zZi1kdW1wLXRvZ2dsZS8udGVzdChuLmNsYXNzTmFtZSkpIHsgbiA9IG4ubmV4dEVsZW1lbnRTaWJsaW5nIHx8IG47IH0gZihuLCBlLCB0cnVlKTsgfSB9IH0pOyB9OyBmdW5jdGlvbiBpc0N0cmxLZXkoZSkgeyByZXR1cm4gZS5jdHJsS2V5IHx8IGUubWV0YUtleTsgfSBmdW5jdGlvbiB4cGF0aFN0cmluZyhzdHIpIHsgdmFyIHBhcnRzID0gc3RyLm1hdGNoKC9bXiciXSt8WyciXS9nKS5tYXAoZnVuY3Rpb24gKHBhcnQpIHsgaWYgKCInIiA9PSBwYXJ0KSB7IHJldHVybiAnIlwnIic7IH0gaWYgKCciJyA9PSBwYXJ0KSB7IHJldHVybiAiJ1wiJyI7IH0gcmV0dXJuICInIiArIHBhcnQgKyAiJyI7IH0pOyByZXR1cm4gImNvbmNhdCgiICsgcGFydHMuam9pbigiLCIpICsgIiwgJycpIjsgfSBmdW5jdGlvbiB4cGF0aEhhc0NsYXNzKGNsYXNzTmFtZSkgeyByZXR1cm4gImNvbnRhaW5zKGNvbmNhdCgnICcsIG5vcm1hbGl6ZS1zcGFjZShAY2xhc3MpLCAnICcpLCAnICIgKyBjbGFzc05hbWUgKyIgJykiOyB9IGFkZEV2ZW50TGlzdGVuZXIocm9vdCwgJ21vdXNlb3ZlcicsIGZ1bmN0aW9uIChlKSB7IGlmICgnJyAhPSByZWZTdHlsZS5pbm5lckhUTUwpIHsgcmVmU3R5bGUuaW5uZXJIVE1MID0gJyc7IH0gfSk7IGEoJ21vdXNlb3ZlcicsIGZ1bmN0aW9uIChhLCBlLCBjKSB7IGlmIChjKSB7IGUudGFyZ2V0LnN0eWxlLmN1cnNvciA9ICJwb2ludGVyIjsgfSBlbHNlIGlmIChhID0gaWRSeC5leGVjKGEuY2xhc3NOYW1lKSkgeyB0cnkgeyByZWZTdHlsZS5pbm5lckhUTUwgPSAncHJlLnNmLWR1bXAgLicrYVswXSsne2JhY2tncm91bmQtY29sb3I6ICNCNzI5RDk7IGNvbG9yOiAjRkZGICFpbXBvcnRhbnQ7IGJvcmRlci1yYWRpdXM6IDJweH0nOyB9IGNhdGNoIChlKSB7IH0gfSB9KTsgYSgnY2xpY2snLCBmdW5jdGlvbiAoYSwgZSwgYykgeyBpZiAoL3NmLWR1bXAtdG9nZ2xlLy50ZXN0KGEuY2xhc3NOYW1lKSkgeyBlLnByZXZlbnREZWZhdWx0KCk7IGlmICghdG9nZ2xlKGEsIGlzQ3RybEtleShlKSkpIHsgdmFyIHIgPSBkb2MuZ2V0RWxlbWVudEJ5SWQoYS5nZXRBdHRyaWJ1dGUoJ2hyZWYnKS5zbGljZSgxKSksIHMgPSByLnByZXZpb3VzU2libGluZywgZiA9IHIucGFyZW50Tm9kZSwgdCA9IGEucGFyZW50Tm9kZTsgdC5yZXBsYWNlQ2hpbGQociwgYSk7IGYucmVwbGFjZUNoaWxkKGEsIHMpOyB0Lmluc2VydEJlZm9yZShzLCByKTsgZiA9IGYuZmlyc3RDaGlsZC5ub2RlVmFsdWUubWF0Y2goaW5kZW50UngpOyB0ID0gdC5maXJzdENoaWxkLm5vZGVWYWx1ZS5tYXRjaChpbmRlbnRSeCk7IGlmIChmICYmIHQgJiYgZlswXSAhPT0gdFswXSkgeyByLmlubmVySFRNTCA9IHIuaW5uZXJIVE1MLnJlcGxhY2UobmV3IFJlZ0V4cCgnXicrZlswXS5yZXBsYWNlKHJ4RXNjLCAnXCQxJyksICdtZycpLCB0WzBdKTsgfSBpZiAoL3NmLWR1bXAtY29tcGFjdC8udGVzdChyLmNsYXNzTmFtZSkpIHsgdG9nZ2xlKHMsIGlzQ3RybEtleShlKSk7IH0gfSBpZiAoYykgeyB9IGVsc2UgaWYgKGRvYy5nZXRTZWxlY3Rpb24pIHsgdHJ5IHsgZG9jLmdldFNlbGVjdGlvbigpLnJlbW92ZUFsbFJhbmdlcygpOyB9IGNhdGNoIChlKSB7IGRvYy5nZXRTZWxlY3Rpb24oKS5lbXB0eSgpOyB9IH0gZWxzZSB7IGRvYy5zZWxlY3Rpb24uZW1wdHkoKTsgfSB9IGVsc2UgaWYgKC9zZi1kdW1wLXN0ci10b2dnbGUvLnRlc3QoYS5jbGFzc05hbWUpKSB7IGUucHJldmVudERlZmF1bHQoKTsgZSA9IGEucGFyZW50Tm9kZS5wYXJlbnROb2RlOyBlLmNsYXNzTmFtZSA9IGUuY2xhc3NOYW1lLnJlcGxhY2UoL3NmLWR1bXAtc3RyLShleHBhbmR8Y29sbGFwc2UpLywgYS5wYXJlbnROb2RlLmNsYXNzTmFtZSk7IH0gfSk7IGVsdCA9IHJvb3QuZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ1NBTVAnKTsgbGVuID0gZWx0Lmxlbmd0aDsgaSA9IDA7IHdoaWxlIChpIDwgbGVuKSB0LnB1c2goZWx0W2krK10pOyBsZW4gPSB0Lmxlbmd0aDsgZm9yIChpID0gMDsgaSA8IGxlbjsgKytpKSB7IGVsdCA9IHRbaV07IGlmICgnU0FNUCcgPT0gZWx0LnRhZ05hbWUpIHsgYSA9IGVsdC5wcmV2aW91c1NpYmxpbmcgfHwge307IGlmICgnQScgIT0gYS50YWdOYW1lKSB7IGEgPSBkb2MuY3JlYXRlRWxlbWVudCgnQScpOyBhLmNsYXNzTmFtZSA9ICdzZi1kdW1wLXJlZic7IGVsdC5wYXJlbnROb2RlLmluc2VydEJlZm9yZShhLCBlbHQpOyB9IGVsc2UgeyBhLmlubmVySFRNTCArPSAnICc7IH0gYS50aXRsZSA9IChhLnRpdGxlID8gYS50aXRsZSsnDQpbJyA6ICdbJykra2V5SGludCsnK2NsaWNrXSBFeHBhbmQgYWxsIGNoaWxkcmVuJzsgYS5pbm5lckhUTUwgKz0gZWx0LmNsYXNzTmFtZSA9PSAnc2YtZHVtcC1jb21wYWN0JyA/ICc8c3Bhbj4mIzk2NTQ7PC9zcGFuPicgOiAnPHNwYW4+JiM5NjYwOzwvc3Bhbj4nOyBhLmNsYXNzTmFtZSArPSAnIHNmLWR1bXAtdG9nZ2xlJzsgeCA9IDE7IGlmICgnc2YtZHVtcCcgIT0gZWx0LnBhcmVudE5vZGUuY2xhc3NOYW1lKSB7IHggKz0gZWx0LnBhcmVudE5vZGUuZ2V0QXR0cmlidXRlKCdkYXRhLWRlcHRoJykvMTsgfSB9IGVsc2UgaWYgKC9zZi1kdW1wLXJlZi8udGVzdChlbHQuY2xhc3NOYW1lKSAmJiAoYSA9IGVsdC5nZXRBdHRyaWJ1dGUoJ2hyZWYnKSkpIHsgYSA9IGEuc2xpY2UoMSk7IGVsdC5jbGFzc05hbWUgKz0gJyAnK2E7IGlmICgvW1xbe10kLy50ZXN0KGVsdC5wcmV2aW91c1NpYmxpbmcubm9kZVZhbHVlKSkgeyBhID0gYSAhPSBlbHQubmV4dFNpYmxpbmcuaWQgJiYgZG9jLmdldEVsZW1lbnRCeUlkKGEpOyB0cnkgeyBzID0gYS5uZXh0U2libGluZzsgZWx0LmFwcGVuZENoaWxkKGEpOyBzLnBhcmVudE5vZGUuaW5zZXJ0QmVmb3JlKGEsIHMpOyBpZiAoL15bQCNdLy50ZXN0KGVsdC5pbm5lckhUTUwpKSB7IGVsdC5pbm5lckhUTUwgKz0gJyA8c3Bhbj4mIzk2NTQ7PC9zcGFuPic7IH0gZWxzZSB7IGVsdC5pbm5lckhUTUwgPSAnPHNwYW4+JiM5NjU0Ozwvc3Bhbj4nOyBlbHQuY2xhc3NOYW1lID0gJ3NmLWR1bXAtcmVmJzsgfSBlbHQuY2xhc3NOYW1lICs9ICcgc2YtZHVtcC10b2dnbGUnOyB9IGNhdGNoIChlKSB7IGlmICgnJicgPT0gZWx0LmlubmVySFRNTC5jaGFyQXQoMCkpIHsgZWx0LmlubmVySFRNTCA9ICcmIzgyMzA7JzsgZWx0LmNsYXNzTmFtZSA9ICdzZi1kdW1wLXJlZic7IH0gfSB9IH0gfSBpZiAoZG9jLmV2YWx1YXRlICYmIEFycmF5LmZyb20gJiYgcm9vdC5jaGlsZHJlbi5sZW5ndGggPiAxKSB7IHJvb3Quc2V0QXR0cmlidXRlKCd0YWJpbmRleCcsIDApOyBTZWFyY2hTdGF0ZSA9IGZ1bmN0aW9uICgpIHsgdGhpcy5ub2RlcyA9IFtdOyB0aGlzLmlkeCA9IDA7IH07IFNlYXJjaFN0YXRlLnByb3RvdHlwZSA9IHsgbmV4dDogZnVuY3Rpb24gKCkgeyBpZiAodGhpcy5pc0VtcHR5KCkpIHsgcmV0dXJuIHRoaXMuY3VycmVudCgpOyB9IHRoaXMuaWR4ID0gdGhpcy5pZHggPCAodGhpcy5ub2Rlcy5sZW5ndGggLSAxKSA/IHRoaXMuaWR4ICsgMSA6IDA7IHJldHVybiB0aGlzLmN1cnJlbnQoKTsgfSwgcHJldmlvdXM6IGZ1bmN0aW9uICgpIHsgaWYgKHRoaXMuaXNFbXB0eSgpKSB7IHJldHVybiB0aGlzLmN1cnJlbnQoKTsgfSB0aGlzLmlkeCA9IHRoaXMuaWR4ID4gMCA/IHRoaXMuaWR4IC0gMSA6ICh0aGlzLm5vZGVzLmxlbmd0aCAtIDEpOyByZXR1cm4gdGhpcy5jdXJyZW50KCk7IH0sIGlzRW1wdHk6IGZ1bmN0aW9uICgpIHsgcmV0dXJuIDAgPT09IHRoaXMuY291bnQoKTsgfSwgY3VycmVudDogZnVuY3Rpb24gKCkgeyBpZiAodGhpcy5pc0VtcHR5KCkpIHsgcmV0dXJuIG51bGw7IH0gcmV0dXJuIHRoaXMubm9kZXNbdGhpcy5pZHhdOyB9LCByZXNldDogZnVuY3Rpb24gKCkgeyB0aGlzLm5vZGVzID0gW107IHRoaXMuaWR4ID0gMDsgfSwgY291bnQ6IGZ1bmN0aW9uICgpIHsgcmV0dXJuIHRoaXMubm9kZXMubGVuZ3RoOyB9LCB9OyBmdW5jdGlvbiBzaG93Q3VycmVudChzdGF0ZSkgeyB2YXIgY3VycmVudE5vZGUgPSBzdGF0ZS5jdXJyZW50KCksIGN1cnJlbnRSZWN0LCBzZWFyY2hSZWN0OyBpZiAoY3VycmVudE5vZGUpIHsgcmV2ZWFsKGN1cnJlbnROb2RlKTsgaGlnaGxpZ2h0KHJvb3QsIGN1cnJlbnROb2RlLCBzdGF0ZS5ub2Rlcyk7IGlmICgnc2Nyb2xsSW50b1ZpZXcnIGluIGN1cnJlbnROb2RlKSB7IGN1cnJlbnROb2RlLnNjcm9sbEludG9WaWV3KHRydWUpOyBjdXJyZW50UmVjdCA9IGN1cnJlbnROb2RlLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpOyBzZWFyY2hSZWN0ID0gc2VhcmNoLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpOyBpZiAoY3VycmVudFJlY3QudG9wIDwgKHNlYXJjaFJlY3QudG9wICsgc2VhcmNoUmVjdC5oZWlnaHQpKSB7IHdpbmRvdy5zY3JvbGxCeSgwLCAtKHNlYXJjaFJlY3QudG9wICsgc2VhcmNoUmVjdC5oZWlnaHQgKyA1KSk7IH0gfSB9IGNvdW50ZXIudGV4dENvbnRlbnQgPSAoc3RhdGUuaXNFbXB0eSgpID8gMCA6IHN0YXRlLmlkeCArIDEpICsgJyBvZiAnICsgc3RhdGUuY291bnQoKTsgfSB2YXIgc2VhcmNoID0gZG9jLmNyZWF0ZUVsZW1lbnQoJ2RpdicpOyBzZWFyY2guY2xhc3NOYW1lID0gJ3NmLWR1bXAtc2VhcmNoLXdyYXBwZXIgc2YtZHVtcC1zZWFyY2gtaGlkZGVuJzsgc2VhcmNoLmlubmVySFRNTCA9ICcgPGlucHV0IHR5cGU9InRleHQiIGNsYXNzPSJzZi1kdW1wLXNlYXJjaC1pbnB1dCI+IDxzcGFuIGNsYXNzPSJzZi1kdW1wLXNlYXJjaC1jb3VudCI+MCBvZiAwPFwvc3Bhbj4gPGJ1dHRvbiB0eXBlPSJidXR0b24iIGNsYXNzPSJzZi1kdW1wLXNlYXJjaC1pbnB1dC1wcmV2aW91cyIgdGFiaW5kZXg9Ii0xIj4gPHN2ZyB2aWV3Qm94PSIwIDAgMTc5MiAxNzkyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xNjgzIDEzMzFsLTE2NiAxNjVxLTE5IDE5LTQ1IDE5dC00NS0xOUw4OTYgOTY1bC01MzEgNTMxcS0xOSAxOS00NSAxOXQtNDUtMTlsLTE2Ni0xNjVxLTE5LTE5LTE5LTQ1LjV0MTktNDUuNWw3NDItNzQxcTE5LTE5IDQ1LTE5dDQ1IDE5bDc0MiA3NDFxMTkgMTkgMTkgNDUuNXQtMTkgNDUuNXoiXC8+PFwvc3ZnPiA8XC9idXR0b24+IDxidXR0b24gdHlwZT0iYnV0dG9uIiBjbGFzcz0ic2YtZHVtcC1zZWFyY2gtaW5wdXQtbmV4dCIgdGFiaW5kZXg9Ii0xIj4gPHN2ZyB2aWV3Qm94PSIwIDAgMTc5MiAxNzkyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xNjgzIDgwOGwtNzQyIDc0MXEtMTkgMTktNDUgMTl0LTQ1LTE5TDEwOSA4MDhxLTE5LTE5LTE5LTQ1LjV0MTktNDUuNWwxNjYtMTY1cTE5LTE5IDQ1LTE5dDQ1IDE5bDUzMSA1MzEgNTMxLTUzMXExOS0xOSA0NS0xOXQ0NSAxOWwxNjYgMTY1cTE5IDE5IDE5IDQ1LjV0LTE5IDQ1LjV6IlwvPjxcL3N2Zz4gPFwvYnV0dG9uPiAnOyByb290Lmluc2VydEJlZm9yZShzZWFyY2gsIHJvb3QuZmlyc3RDaGlsZCk7IHZhciBzdGF0ZSA9IG5ldyBTZWFyY2hTdGF0ZSgpOyB2YXIgc2VhcmNoSW5wdXQgPSBzZWFyY2gucXVlcnlTZWxlY3RvcignLnNmLWR1bXAtc2VhcmNoLWlucHV0Jyk7IHZhciBjb3VudGVyID0gc2VhcmNoLnF1ZXJ5U2VsZWN0b3IoJy5zZi1kdW1wLXNlYXJjaC1jb3VudCcpOyB2YXIgc2VhcmNoSW5wdXRUaW1lciA9IDA7IHZhciBwcmV2aW91c1NlYXJjaFF1ZXJ5ID0gJyc7IGFkZEV2ZW50TGlzdGVuZXIoc2VhcmNoSW5wdXQsICdrZXl1cCcsIGZ1bmN0aW9uIChlKSB7IHZhciBzZWFyY2hRdWVyeSA9IGUudGFyZ2V0LnZhbHVlOyAvKiBEb24ndCBwZXJmb3JtIGFueXRoaW5nIGlmIHRoZSBwcmVzc2VkIGtleSBkaWRuJ3QgY2hhbmdlIHRoZSBxdWVyeSAqLyBpZiAoc2VhcmNoUXVlcnkgPT09IHByZXZpb3VzU2VhcmNoUXVlcnkpIHsgcmV0dXJuOyB9IHByZXZpb3VzU2VhcmNoUXVlcnkgPSBzZWFyY2hRdWVyeTsgY2xlYXJUaW1lb3V0KHNlYXJjaElucHV0VGltZXIpOyBzZWFyY2hJbnB1dFRpbWVyID0gc2V0VGltZW91dChmdW5jdGlvbiAoKSB7IHN0YXRlLnJlc2V0KCk7IGNvbGxhcHNlQWxsKHJvb3QpOyByZXNldEhpZ2hsaWdodGVkTm9kZXMocm9vdCk7IGlmICgnJyA9PT0gc2VhcmNoUXVlcnkpIHsgY291bnRlci50ZXh0Q29udGVudCA9ICcwIG9mIDAnOyByZXR1cm47IH0gdmFyIGNsYXNzTWF0Y2hlcyA9IFsgInNmLWR1bXAtc3RyIiwgInNmLWR1bXAta2V5IiwgInNmLWR1bXAtcHVibGljIiwgInNmLWR1bXAtcHJvdGVjdGVkIiwgInNmLWR1bXAtcHJpdmF0ZSIsIF0ubWFwKHhwYXRoSGFzQ2xhc3MpLmpvaW4oJyBvciAnKTsgdmFyIHhwYXRoUmVzdWx0ID0gZG9jLmV2YWx1YXRlKCcuLy9zcGFuWycgKyBjbGFzc01hdGNoZXMgKyAnXVtjb250YWlucyh0cmFuc2xhdGUoY2hpbGQ6OnRleHQoKSwgJyArIHhwYXRoU3RyaW5nKHNlYXJjaFF1ZXJ5LnRvVXBwZXJDYXNlKCkpICsgJywgJyArIHhwYXRoU3RyaW5nKHNlYXJjaFF1ZXJ5LnRvTG93ZXJDYXNlKCkpICsgJyksICcgKyB4cGF0aFN0cmluZyhzZWFyY2hRdWVyeS50b0xvd2VyQ2FzZSgpKSArICcpXScsIHJvb3QsIG51bGwsIFhQYXRoUmVzdWx0Lk9SREVSRURfTk9ERV9JVEVSQVRPUl9UWVBFLCBudWxsKTsgd2hpbGUgKG5vZGUgPSB4cGF0aFJlc3VsdC5pdGVyYXRlTmV4dCgpKSBzdGF0ZS5ub2Rlcy5wdXNoKG5vZGUpOyBzaG93Q3VycmVudChzdGF0ZSk7IH0sIDQwMCk7IH0pOyBBcnJheS5mcm9tKHNlYXJjaC5xdWVyeVNlbGVjdG9yQWxsKCcuc2YtZHVtcC1zZWFyY2gtaW5wdXQtbmV4dCwgLnNmLWR1bXAtc2VhcmNoLWlucHV0LXByZXZpb3VzJykpLmZvckVhY2goZnVuY3Rpb24gKGJ0bikgeyBhZGRFdmVudExpc3RlbmVyKGJ0biwgJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHsgZS5wcmV2ZW50RGVmYXVsdCgpOyAtMSAhPT0gZS50YXJnZXQuY2xhc3NOYW1lLmluZGV4T2YoJ25leHQnKSA/IHN0YXRlLm5leHQoKSA6IHN0YXRlLnByZXZpb3VzKCk7IHNlYXJjaElucHV0LmZvY3VzKCk7IGNvbGxhcHNlQWxsKHJvb3QpOyBzaG93Q3VycmVudChzdGF0ZSk7IH0pIH0pOyBhZGRFdmVudExpc3RlbmVyKHJvb3QsICdrZXlkb3duJywgZnVuY3Rpb24gKGUpIHsgdmFyIGlzU2VhcmNoQWN0aXZlID0gIS9zZi1kdW1wLXNlYXJjaC1oaWRkZW4vLnRlc3Qoc2VhcmNoLmNsYXNzTmFtZSk7IGlmICgoMTE0ID09PSBlLmtleUNvZGUgJiYgIWlzU2VhcmNoQWN0aXZlKSB8fCAoaXNDdHJsS2V5KGUpICYmIDcwID09PSBlLmtleUNvZGUpKSB7IC8qIEYzIG9yIENNRC9DVFJMICsgRiAqLyBpZiAoNzAgPT09IGUua2V5Q29kZSAmJiBkb2N1bWVudC5hY3RpdmVFbGVtZW50ID09PSBzZWFyY2hJbnB1dCkgeyAvKiAqIElmIENNRC9DVFJMICsgRiBpcyBoaXQgd2hpbGUgaGF2aW5nIGZvY3VzIG9uIHNlYXJjaCBpbnB1dCwgKiB0aGUgdXNlciBwcm9iYWJseSBtZWFudCB0byB0cmlnZ2VyIGJyb3dzZXIgc2VhcmNoIGluc3RlYWQuICogTGV0IHRoZSBicm93c2VyIGV4ZWN1dGUgaXRzIGJlaGF2aW9yOiAqLyByZXR1cm47IH0gZS5wcmV2ZW50RGVmYXVsdCgpOyBzZWFyY2guY2xhc3NOYW1lID0gc2VhcmNoLmNsYXNzTmFtZS5yZXBsYWNlKC9zZi1kdW1wLXNlYXJjaC1oaWRkZW4vLCAnJyk7IHNlYXJjaElucHV0LmZvY3VzKCk7IH0gZWxzZSBpZiAoaXNTZWFyY2hBY3RpdmUpIHsgaWYgKDI3ID09PSBlLmtleUNvZGUpIHsgLyogRVNDIGtleSAqLyBzZWFyY2guY2xhc3NOYW1lICs9ICcgc2YtZHVtcC1zZWFyY2gtaGlkZGVuJzsgZS5wcmV2ZW50RGVmYXVsdCgpOyByZXNldEhpZ2hsaWdodGVkTm9kZXMocm9vdCk7IHNlYXJjaElucHV0LnZhbHVlID0gJyc7IH0gZWxzZSBpZiAoIChpc0N0cmxLZXkoZSkgJiYgNzEgPT09IGUua2V5Q29kZSkgLyogQ01EL0NUUkwgKyBHICovIHx8IDEzID09PSBlLmtleUNvZGUgLyogRW50ZXIgKi8gfHwgMTE0ID09PSBlLmtleUNvZGUgLyogRjMgKi8gKSB7IGUucHJldmVudERlZmF1bHQoKTsgZS5zaGlmdEtleSA/IHN0YXRlLnByZXZpb3VzKCkgOiBzdGF0ZS5uZXh0KCk7IGNvbGxhcHNlQWxsKHJvb3QpOyBzaG93Q3VycmVudChzdGF0ZSk7IH0gfSB9KTsgfSBpZiAoMCA+PSBvcHRpb25zLm1heFN0cmluZ0xlbmd0aCkgeyByZXR1cm47IH0gdHJ5IHsgZWx0ID0gcm9vdC5xdWVyeVNlbGVjdG9yQWxsKCcuc2YtZHVtcC1zdHInKTsgbGVuID0gZWx0Lmxlbmd0aDsgaSA9IDA7IHQgPSBbXTsgd2hpbGUgKGkgPCBsZW4pIHQucHVzaChlbHRbaSsrXSk7IGxlbiA9IHQubGVuZ3RoOyBmb3IgKGkgPSAwOyBpIDwgbGVuOyArK2kpIHsgZWx0ID0gdFtpXTsgcyA9IGVsdC5pbm5lclRleHQgfHwgZWx0LnRleHRDb250ZW50OyB4ID0gcy5sZW5ndGggLSBvcHRpb25zLm1heFN0cmluZ0xlbmd0aDsgaWYgKDAgPCB4KSB7IGggPSBlbHQuaW5uZXJIVE1MOyBlbHRbZWx0LmlubmVyVGV4dCA/ICdpbm5lclRleHQnIDogJ3RleHRDb250ZW50J10gPSBzLnN1YnN0cmluZygwLCBvcHRpb25zLm1heFN0cmluZ0xlbmd0aCk7IGVsdC5jbGFzc05hbWUgKz0gJyBzZi1kdW1wLXN0ci1jb2xsYXBzZSc7IGVsdC5pbm5lckhUTUwgPSAnPHNwYW4gY2xhc3M9c2YtZHVtcC1zdHItY29sbGFwc2U+JytoKyc8YSBjbGFzcz0ic2YtZHVtcC1yZWYgc2YtZHVtcC1zdHItdG9nZ2xlIiB0aXRsZT0iQ29sbGFwc2UiPiAmIzk2NjQ7PC9hPjwvc3Bhbj4nKyAnPHNwYW4gY2xhc3M9c2YtZHVtcC1zdHItZXhwYW5kPicrZWx0LmlubmVySFRNTCsnPGEgY2xhc3M9InNmLWR1bXAtcmVmIHNmLWR1bXAtc3RyLXRvZ2dsZSIgdGl0bGU9IicreCsnIHJlbWFpbmluZyBjaGFyYWN0ZXJzIj4gJiM5NjU0OzwvYT48L3NwYW4+JzsgfSB9IH0gY2F0Y2ggKGUpIHsgfSB9OyB9KShkb2N1bWVudCk7IDwvc2NyaXB0PjxzdHlsZT4gcHJlLnNmLWR1bXAgeyBkaXNwbGF5OiBibG9jazsgd2hpdGUtc3BhY2U6IHByZTsgcGFkZGluZzogNXB4OyBvdmVyZmxvdzogaW5pdGlhbCAhaW1wb3J0YW50OyB9IHByZS5zZi1kdW1wOmFmdGVyIHsgY29udGVudDogIiI7IHZpc2liaWxpdHk6IGhpZGRlbjsgZGlzcGxheTogYmxvY2s7IGhlaWdodDogMDsgY2xlYXI6IGJvdGg7IH0gcHJlLnNmLWR1bXAgc3BhbiB7IGRpc3BsYXk6IGlubGluZTsgfSBwcmUuc2YtZHVtcCBhIHsgdGV4dC1kZWNvcmF0aW9uOiBub25lOyBjdXJzb3I6IHBvaW50ZXI7IGJvcmRlcjogMDsgb3V0bGluZTogbm9uZTsgY29sb3I6IGluaGVyaXQ7IH0gcHJlLnNmLWR1bXAgaW1nIHsgbWF4LXdpZHRoOiA1MGVtOyBtYXgtaGVpZ2h0OiA1MGVtOyBtYXJnaW46IC41ZW0gMCAwIDA7IHBhZGRpbmc6IDA7IGJhY2tncm91bmQ6IHVybChkYXRhOmltYWdlL3BuZztiYXNlNjQsaVZCT1J3MEtHZ29BQUFBTlNVaEVVZ0FBQUJBQUFBQVFDQUFBQUFBNm1LQzlBQUFBSFVsRVFWUVkwMk84ekFBQmlsQ2FpUUVOMEVlQThRdVVjWDlnM1FFQUFqY0M1cGl5aHlFQUFBQUFTVVZPUks1Q1lJST0pICNEM0QzRDM7IH0gcHJlLnNmLWR1bXAgLnNmLWR1bXAtZWxsaXBzaXMgeyBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7IG92ZXJmbG93OiB2aXNpYmxlOyB0ZXh0LW92ZXJmbG93OiBlbGxpcHNpczsgbWF4LXdpZHRoOiA1ZW07IHdoaXRlLXNwYWNlOiBub3dyYXA7IG92ZXJmbG93OiBoaWRkZW47IHZlcnRpY2FsLWFsaWduOiB0b3A7IH0gcHJlLnNmLWR1bXAgLnNmLWR1bXAtZWxsaXBzaXMrLnNmLWR1bXAtZWxsaXBzaXMgeyBtYXgtd2lkdGg6IG5vbmU7IH0gcHJlLnNmLWR1bXAgY29kZSB7IGRpc3BsYXk6aW5saW5lOyBwYWRkaW5nOjA7IGJhY2tncm91bmQ6bm9uZTsgfSAuc2YtZHVtcC1wdWJsaWMuc2YtZHVtcC1oaWdobGlnaHQsIC5zZi1kdW1wLXByb3RlY3RlZC5zZi1kdW1wLWhpZ2hsaWdodCwgLnNmLWR1bXAtcHJpdmF0ZS5zZi1kdW1wLWhpZ2hsaWdodCwgLnNmLWR1bXAtc3RyLnNmLWR1bXAtaGlnaGxpZ2h0LCAuc2YtZHVtcC1rZXkuc2YtZHVtcC1oaWdobGlnaHQgeyBiYWNrZ3JvdW5kOiByZ2JhKDExMSwgMTcyLCAyMDQsIDAuMyk7IGJvcmRlcjogMXB4IHNvbGlkICM3REEwQjE7IGJvcmRlci1yYWRpdXM6IDNweDsgfSAuc2YtZHVtcC1wdWJsaWMuc2YtZHVtcC1oaWdobGlnaHQtYWN0aXZlLCAuc2YtZHVtcC1wcm90ZWN0ZWQuc2YtZHVtcC1oaWdobGlnaHQtYWN0aXZlLCAuc2YtZHVtcC1wcml2YXRlLnNmLWR1bXAtaGlnaGxpZ2h0LWFjdGl2ZSwgLnNmLWR1bXAtc3RyLnNmLWR1bXAtaGlnaGxpZ2h0LWFjdGl2ZSwgLnNmLWR1bXAta2V5LnNmLWR1bXAtaGlnaGxpZ2h0LWFjdGl2ZSB7IGJhY2tncm91bmQ6IHJnYmEoMjUzLCAxNzUsIDAsIDAuNCk7IGJvcmRlcjogMXB4IHNvbGlkICNmZmE1MDA7IGJvcmRlci1yYWRpdXM6IDNweDsgfSBwcmUuc2YtZHVtcCAuc2YtZHVtcC1zZWFyY2gtaGlkZGVuIHsgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50OyB9IHByZS5zZi1kdW1wIC5zZi1kdW1wLXNlYXJjaC13cmFwcGVyIHsgZm9udC1zaXplOiAwOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBtYXJnaW4tYm90dG9tOiA1cHg7IGRpc3BsYXk6IGZsZXg7IHBvc2l0aW9uOiAtd2Via2l0LXN0aWNreTsgcG9zaXRpb246IHN0aWNreTsgdG9wOiA1cHg7IH0gcHJlLnNmLWR1bXAgLnNmLWR1bXAtc2VhcmNoLXdyYXBwZXIgPiAqIHsgdmVydGljYWwtYWxpZ246IHRvcDsgYm94LXNpemluZzogYm9yZGVyLWJveDsgaGVpZ2h0OiAyMXB4OyBmb250LXdlaWdodDogbm9ybWFsOyBib3JkZXItcmFkaXVzOiAwOyBiYWNrZ3JvdW5kOiAjRkZGOyBjb2xvcjogIzc1NzU3NTsgYm9yZGVyOiAxcHggc29saWQgI0JCQjsgfSBwcmUuc2YtZHVtcCAuc2YtZHVtcC1zZWFyY2gtd3JhcHBlciA+IGlucHV0LnNmLWR1bXAtc2VhcmNoLWlucHV0IHsgcGFkZGluZzogM3B4OyBoZWlnaHQ6IDIxcHg7IGZvbnQtc2l6ZTogMTJweDsgYm9yZGVyLXJpZ2h0OiBub25lOyBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAzcHg7IGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDNweDsgY29sb3I6ICMwMDA7IG1pbi13aWR0aDogMTVweDsgd2lkdGg6IDEwMCU7IH0gcHJlLnNmLWR1bXAgLnNmLWR1bXAtc2VhcmNoLXdyYXBwZXIgPiAuc2YtZHVtcC1zZWFyY2gtaW5wdXQtbmV4dCwgcHJlLnNmLWR1bXAgLnNmLWR1bXAtc2VhcmNoLXdyYXBwZXIgPiAuc2YtZHVtcC1zZWFyY2gtaW5wdXQtcHJldmlvdXMgeyBiYWNrZ3JvdW5kOiAjRjJGMkYyOyBvdXRsaW5lOiBub25lOyBib3JkZXItbGVmdDogbm9uZTsgZm9udC1zaXplOiAwOyBsaW5lLWhlaWdodDogMDsgfSBwcmUuc2YtZHVtcCAuc2YtZHVtcC1zZWFyY2gtd3JhcHBlciA+IC5zZi1kdW1wLXNlYXJjaC1pbnB1dC1uZXh0IHsgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDNweDsgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IDNweDsgfSBwcmUuc2YtZHVtcCAuc2YtZHVtcC1zZWFyY2gtd3JhcHBlciA+IC5zZi1kdW1wLXNlYXJjaC1pbnB1dC1uZXh0ID4gc3ZnLCBwcmUuc2YtZHVtcCAuc2YtZHVtcC1zZWFyY2gtd3JhcHBlciA+IC5zZi1kdW1wLXNlYXJjaC1pbnB1dC1wcmV2aW91cyA+IHN2ZyB7IHBvaW50ZXItZXZlbnRzOiBub25lOyB3aWR0aDogMTJweDsgaGVpZ2h0OiAxMnB4OyB9IHByZS5zZi1kdW1wIC5zZi1kdW1wLXNlYXJjaC13cmFwcGVyID4gLnNmLWR1bXAtc2VhcmNoLWNvdW50IHsgZGlzcGxheTogaW5saW5lLWJsb2NrOyBwYWRkaW5nOiAwIDVweDsgbWFyZ2luOiAwOyBib3JkZXItbGVmdDogbm9uZTsgbGluZS1oZWlnaHQ6IDIxcHg7IGZvbnQtc2l6ZTogMTJweDsgfXByZS5zZi1kdW1wLCBwcmUuc2YtZHVtcCAuc2YtZHVtcC1kZWZhdWx0e2JhY2tncm91bmQtY29sb3I6IzE4MTcxQjsgY29sb3I6I0ZGODQwMDsgbGluZS1oZWlnaHQ6MS4yZW07IGZvbnQ6MTJweCBNZW5sbywgTW9uYWNvLCBDb25zb2xhcywgbW9ub3NwYWNlOyB3b3JkLXdyYXA6IGJyZWFrLXdvcmQ7IHdoaXRlLXNwYWNlOiBwcmUtd3JhcDsgcG9zaXRpb246cmVsYXRpdmU7IHotaW5kZXg6OTk5OTk7IHdvcmQtYnJlYWs6IGJyZWFrLWFsbH1wcmUuc2YtZHVtcCAuc2YtZHVtcC1udW17Zm9udC13ZWlnaHQ6Ym9sZDsgY29sb3I6IzEyOTlEQX1wcmUuc2YtZHVtcCAuc2YtZHVtcC1jb25zdHtmb250LXdlaWdodDpib2xkfXByZS5zZi1kdW1wIC5zZi1kdW1wLXN0cntmb250LXdlaWdodDpib2xkOyBjb2xvcjojNTZEQjNBfXByZS5zZi1kdW1wIC5zZi1kdW1wLW5vdGV7Y29sb3I6IzEyOTlEQX1wcmUuc2YtZHVtcCAuc2YtZHVtcC1yZWZ7Y29sb3I6I0EwQTBBMH1wcmUuc2YtZHVtcCAuc2YtZHVtcC1wdWJsaWN7Y29sb3I6I0ZGRkZGRn1wcmUuc2YtZHVtcCAuc2YtZHVtcC1wcm90ZWN0ZWR7Y29sb3I6I0ZGRkZGRn1wcmUuc2YtZHVtcCAuc2YtZHVtcC1wcml2YXRle2NvbG9yOiNGRkZGRkZ9cHJlLnNmLWR1bXAgLnNmLWR1bXAtbWV0YXtjb2xvcjojQjcyOUQ5fXByZS5zZi1kdW1wIC5zZi1kdW1wLWtleXtjb2xvcjojNTZEQjNBfXByZS5zZi1kdW1wIC5zZi1kdW1wLWluZGV4e2NvbG9yOiMxMjk5REF9cHJlLnNmLWR1bXAgLnNmLWR1bXAtZWxsaXBzaXN7Y29sb3I6I0ZGODQwMH1wcmUuc2YtZHVtcCAuc2YtZHVtcC1uc3t1c2VyLXNlbGVjdDpub25lO31wcmUuc2YtZHVtcCAuc2YtZHVtcC1lbGxpcHNpcy1ub3Rle2NvbG9yOiMxMjk5REF9PC9zdHlsZT48cHJlIGNsYXNzPXNmLWR1bXAgaWQ9c2YtZHVtcC0xMDM0OTI4ODcyIGRhdGEtaW5kZW50LXBhZD0iICAiPiI8c3BhbiBjbGFzcz1zZi1kdW1wLXN0ciB0aXRsZT0iNDAgY2hhcmFjdGVycyI+SXQgd29ya3MhIFRoYW5rIHlvdSBmb3IgdXNpbmcgTGFyYUR1bXBzITwvc3Bhbj4iDQo8L3ByZT48c2NyaXB0PlNmZHVtcCgic2YtZHVtcC0xMDM0OTI4ODcyIik8L3NjcmlwdD4=
END;

    return base64_decode($html);
}
function htmlDump(): string
{
    $html = <<< END
    PHByZSBjbGFzcz1zZi1kdW1wIGlkPXNmLWR1bXAtMTAzNDkyODg3MiBkYXRhLWluZGVudC1wYWQ9IiAgIj4iPHNwYW4gY2xhc3M9c2YtZHVtcC1zdHIgdGl0bGU9IjQwIGNoYXJhY3RlcnMiPkl0IHdvcmtzISBUaGFuayB5b3UgZm9yIHVzaW5nIExhcmFEdW1wcyE8L3NwYW4+Ig0KPC9wcmU+
    END;

    return base64_decode($html);
}
